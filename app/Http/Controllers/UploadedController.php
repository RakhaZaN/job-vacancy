<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurposeJob;
use App\Models\Uploaded;
use Illuminate\Support\Facades\Storage;

class UploadedController extends Controller
{

    public function index(Request $request)
    {
        // $data = PurposeJob::where('job_vacancy_id', $request['j'])->where('candidate_detail_id', auth()->user()->id)->first();
        $data = Uploaded::where('user_id', auth()->user()->id)->get();
        $jobId = $request->has('j') ? $request->j : null;
        return view('job-vacancy.uploadfile')->with(['data' => $data, 'jobId' => $jobId]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'filename' => 'required|file|mimes:pdf',
        ]);
        $validated['user_id'] = auth()->user()->id;
        $validated['upload_at'] = date('Y-m-d');
        // return $validated;

        if ($request->file('filename')) {
            $validated['filename'] = $request->file('filename')->store('attachment');
        }

        Uploaded::create($validated);

        if ($request->has('back')) {
            return back()->with('success', 'Successfully upload file');
        }

        return redirect()->route('job-vacancy.data', ['j' => $request['jobId'], 'selected' => $validated['filename']])->with(['success' => 'Successfully upload file']);
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:uploadeds,id',
        ]);

        $upload = Uploaded::find($validated['id']);

        $used = PurposeJob::where('file_attach', $upload->filename)->get();
        // return $used;
        if (count($used) > 0) {
            return back()->with('failed', 'Cannot delete this file, file used');
        }

        Storage::delete($upload->filename);
        Uploaded::destroy($validated['id']);
        PurposeJob::where('file_attach', $upload->filename)->update(['file_attach' => null]);

        return back()->with('success', 'Successfully delete file');
    }

    public function show()
    {
        $files = Uploaded::with([
            'user:id,fullname'
        ])->get()->sortByDesc('upload_at');
        // return $files;
        return view('admin.filesubmitted', compact('files'));
    }

    public function list()
    {
        $files = Uploaded::where('user_id', auth()->user()->id)->get();

        return view('myfile', compact('files'));
    }

    public function rename(Request $request)
    {

        $filename = 'attachment/' . date('YmdHis') . '-' . $request->filename . '.pdf';
        Uploaded::find($request->id)->update(['filename' => $filename]);
        $attachs = PurposeJob::where('file_attach', $request['old-name'])->update(['file_attach' => $filename]);
        Storage::copy($request['old-name'], $filename);
        Storage::delete($request['old-name']);
        return back()->with('success', 'Successfully rename file');
    }
}
