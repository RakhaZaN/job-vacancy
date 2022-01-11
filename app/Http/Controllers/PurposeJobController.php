<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\PurposeJob;
use Illuminate\Http\Request;

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
        if ($detail == null) {
            return redirect()->route('edit-profile')->with('warning', 'You must already set profile');
        }
        return view('job-vacancy.data')
        ->with('type', $request->type)
        ->with('jobId', $request['j'])
        ->with('detail', $detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('file_attach');
        // $name_file = $request->jobId.auth()->user()->id.'_'.time().'_'.$file->getClientOriginalName();
        // $ekstensi = $file->getClientOriginalExtension();
        // $loc_file = public_path('UploadedFile/Attach');

        // $file->move($loc_file,$name_file);

        $request['file_attach'] = 'file_attach.pdf';
        $request['date'] = date('Y/m/d');
        PurposeJob::create($request->only(['candidate_detail_id', 'job_vacancy_id', 'date', 'file_attach']));
        return redirect()->route('job-vacancy.index')->with('success', 'Successfully apply the job');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurposeJob  $purposeJob
     * @return \Illuminate\Http\Response
     */
    public function show(PurposeJob $purposeJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurposeJob  $purposeJob
     * @return \Illuminate\Http\Response
     */
    public function edit(PurposeJob $purposeJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurposeJob  $purposeJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurposeJob $purposeJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurposeJob  $purposeJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurposeJob $purposeJob)
    {
        //
    }
}
