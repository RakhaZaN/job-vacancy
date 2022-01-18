<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\PurposeJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::whereHas('purposeJob', function(Builder $q) {
            $q->where('candidate_detail_id', auth()->user()->id);
        })->get();

        if (auth()->user()->role == 'admin') {
            $announcements = Announcement::with([
                'purposeJob:id,status'
            ])->get();
        }

        return view('announcement', compact('announcements'));
    }
    public function create(Request $request)
    {
        return view('admin.announcement', ['pj' => $request['pj']]);
    }

    public function save(Request $request)
    {
        // return $request->all();

        $updateStatus = $request->validate([
            'status' => 'required|in:confirmed,rejected'
        ]);

        PurposeJob::find($request['purpose_job_id'])->update($updateStatus);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'announcement' => 'required'
        ]);

        Announcement::updateOrCreate(['purpose_job_id' => $request['purpose_job_id']], $validated);

        return redirect()->route('job-vacancy.index')->with('success', 'Success make an announcement');
    }
}
