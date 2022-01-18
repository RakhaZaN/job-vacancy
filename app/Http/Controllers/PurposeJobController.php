<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\PurposeJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurposeJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $detail = CandidateDetail::where('user_id', auth()->user()->id)->first();
        $data = PurposeJob::where('job_vacancy_id', $request['j'])->where('candidate_detail_id', auth()->user()->id)->first();
        return view('job-vacancy.data')
        ->with('type', $request->type)
        ->with('jobId', $request['j'])
        ->with('date', $data['date'] ?? null)
        ->with('pathFile', $data['file_attach'] ?? null)
        ->with('detail', $detail);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'job_vacancy_id' => 'exists:job_vacancy,id',
            'candidate_detail_id' => 'exists:candidate_detail,user_id',
            'file_attach' => 'required',
            'date' => 'date'
        ]);

        PurposeJob::updateOrCreate([
            'job_vacancy_id' => $validated['job_vacancy_id'],
            'candidate_detail_id' => $validated['candidate_detail_id']
        ], $validated);
        return redirect()->route('job-vacancy.index')->with('success', 'Successfully apply the job');
    }

    public function uploadFile(Request $request)
    {
        $data = PurposeJob::where('job_vacancy_id', $request['j'])->where('candidate_detail_id', auth()->user()->id)->first();
        return view('job-vacancy.uploadfile')->with(['pathFile' => $data['file_attach'] ?? null, 'jobId' => $request['j']]);
    }

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'file_attach' => 'file|mimes:pdf'
        ]);

        if ($request->file('file_attach')) {
            if ($request['old_file']) {
                Storage::delete($request['old_file']);
            }
            $validated['file_attach'] = $request->file('file_attach')->store('attachment');
        }

        return redirect()->route('job-vacancy.data', ['j' => $request['jobId']])->with(['fileUploaded' => $validated['file_attach'], 'success' => 'Successfully upload file']);
    }

    public function show()
    {
        $data = PurposeJob::with([
            'candidate:id,fullname',
            'jobVacancy:id,title'
        ])->orderBy('date', 'desc')->get();

        // return $data;

        return view('job-vacancy.submitted', compact('data'));
    }
}
