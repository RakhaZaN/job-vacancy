<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\PurposeLetter;
use App\Models\PurposeJob;
use Illuminate\Http\Request;

class PurposeLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobId = $request->j;
        $typeId = $request->type == "Internship" ? 1 : 0;
        $data = PurposeLetter::where('user_id', auth()->user()->id)
            ->where('is_intern', $typeId)
            ->first();
        $candidate = CandidateDetail::where('user_id', auth()->user()->id)->first();
        if ($candidate == null) {
            return redirect(route('edit-profile'));
        }

        return view('job-vacancy.data')
            ->with('type', $request->type)
            ->with('is_intern', $typeId)
            ->with('detail', $candidate)
            ->with('letter', $data)
            ->with('jobId', $jobId);
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
        $validatedData = $request->validate([
            'we_title' => 'nullable|max:50',
            'we_company' => 'nullable|max:100',
            'we_from' => 'nullable|date',
            'we_to' => 'nullable|date',
            'we_description' => 'nullable|max:255',
            'we_job_level' => 'nullable|in:director,senior,supervisor,officer,entry',
            'edu_level' => 'required|max:50',
            'edu_degree' => 'nullable|in:d1,d2,d3,d4,s1,s2,s3',
            'edu_school' => 'required|max:100',
            'edu_major' => 'required|max:100',
            'edu_start' => 'nullable|date',
            'edu_end' => 'nullable|date',
            // 'file_attach' => 'required',
        ]);

        $validatedData['file_attach'] = 'file-attachment.pdf';

        $upsert = PurposeLetter::updateOrCreate(['user_id' => $request->user_id, 'is_intern' => $request->is_intern], $validatedData);

        PurposeJob::create([
            'job_vacancy_id' => $request->j,
            'purpose_letter_id' => $upsert->id,
            'date' => date('Y/m/d')
        ]);

        return redirect()->route('job-vacancy.index')->with('success', 'Success applied job!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurposeLetter  $purposeLetter
     * @return \Illuminate\Http\Response
     */
    public function show(PurposeLetter $purposeLetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurposeLetter  $purposeLetter
     * @return \Illuminate\Http\Response
     */
    public function edit(PurposeLetter $purposeLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurposeLetter  $purposeLetter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurposeLetter $purposeLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurposeLetter  $purposeLetter
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurposeLetter $purposeLetter)
    {
        //
    }
}
