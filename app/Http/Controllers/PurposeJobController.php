<?php

namespace App\Http\Controllers;

use App\Models\PurposeJob;
use App\Models\PurposeLetter;
use Illuminate\Http\Request;

class PurposeJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request->all();
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

        PurposeLetter::updateOrCreate(['user_id' => $request->user_id, 'is_intern' => $request->is_intern], $validatedData);

        return redirect(route('job-vacancy.index'))->with('success', 'Success sending purpose letter');

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
