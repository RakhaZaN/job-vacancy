<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use App\Models\PurposeJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applied = PurposeJob::with([
            'jobVacancy:id,title,location,employment_type',
        ])->get();

        if (auth()->user()->role == 'admin') {
            $applied = PurposeJob::where('status', 'send')
            ->with([
                'candidate:id,fullname,email',
                'candidate.candidateDetail',
                'jobVacancy:id,type_id,title',
                'jobVacancy.type:id,name',
            ])->get();
        }
        // return $applied;
        return view('job-vacancy.index')
            ->with('job_type', JobType::all())
            ->with('applies', $applied);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function show(JobType $jobType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function edit(JobType $jobType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobType $jobType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobType $jobType)
    {
        //
    }
}
