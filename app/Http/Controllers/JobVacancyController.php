<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\JobType;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->type == 'Internship') {
            return redirect()->route('job-vacancy.data', ['type' => $request->type, 'j' => 1]);
        }
        $jobs = JobType::with([
            'jobList' => function ($q) {
                $q->whereDate('active_date', '>=', date('Y-m-d'))
                ->orderBy('active_date');
            }])
            ->where('name', $request->type)
            ->first();

        $detail = CandidateDetail::where('user_id', auth()->user()->id)->first();
        $validation['age'] = date('Y') - intval(explode('-', $detail['dob'])[0]);
        $validation['position_level'] = $detail['we_job_level'];
        $validation['education'] = $detail['edu_degree'];
        $validation['major'] = $detail['edu_major'];
        $validation['gender'] = $detail['gender'];

        // return $detail;


        // if ($jobs == null) {
        //     return redirect(route('job-vacancy.index'));
        // }
        // return $jobs;
        return view('job-vacancy.joblist')
            ->with('validation', $validation)
            ->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-vacancy.add');
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
            'type_id' => 'required|in:2,3',
            'title' => 'required|max:50',
            'active_date' => 'required|date|after_or_equal:tomorrow',
            'location' => 'required',
            'major' => 'required',
            'employment_type' => 'required|in:contract,regular',
            'education_level' => 'nullable',
            'position_level' => 'required',
            'range_age' => 'required',
            'description' => 'required',
        ]);

        // $validated['range_age'] = '20-25';

        JobVacancy::create($validated);

        return redirect()->route('job-vacancy.index')->with('success', 'Successfully created new vacancy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function show(JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(JobVacancy $jobVacancy, Request $request)
    {
        return view('admin.job-vacancy.edit')
        ->with('job', $jobVacancy->where('id', $request->j)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $validated = $request->validate([
            'type_id' => 'required|in:2,3',
            'title' => 'required|max:50',
            'active_date' => 'required|date',
            'location' => 'required',
            'major' => 'required',
            'employment_type' => 'required|in:contract,regular',
            'education_level' => 'nullable',
            'position_level' => 'required',
            'range_age' => 'required',
            'description' => 'required',
        ]);

        $jobVacancy->where('id', $request->id)->update($validated);

        return redirect()->route('job-vacancy.index')->with('success', 'Successfully update vacancy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        //
    }
}
