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
        $data = PurposeJob::where('job_vacancy_id', $request['j'])->where('candidate_detail_id', auth()->user()->id)->first();
        return view('job-vacancy.data')
        ->with('type', $request->type)
        ->with('jobId', $request['j'])
        ->with('pathFile', $data['file_attach'] ?? null)
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
        $validated = $request->validate([
            'job_vacancy_id' => 'exists:job_vacancy,id',
            'candidate_detail_id' => 'exists:candidate_detail,user_id',
            'file_attach' => 'required|file|mimes:pdf',
            'date' => 'date'
        ]);

        if ($request->file('file_attach')) {
            $validated['file_attach'] = $request->file('file_attach')->store('attachment');
        }

        // return $validated;
        PurposeJob::updateOrCreate([
            'job_vacancy_id' => $validated['job_vacancy_id'],
            'candidate_detail_id' => $validated['candidate_detail_id']
        ], $validated);
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
