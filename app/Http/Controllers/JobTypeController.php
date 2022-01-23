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
        $applied = PurposeJob::where('candidate_detail_id', auth()->user()->id)
        ->with([
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
        $nullFile = PurposeJob::where('candidate_detail_id', auth()->user()->id)->where('file_attach', null)
        ->select('id','job_vacancy_id')
        ->with([
            'jobVacancy:id,title'
        ])->get();
        // return $nullFile;
        return view('job-vacancy.index')
            ->with('job_type', JobType::all())
            ->with('nullFileJob', $nullFile)
            ->with('applies', $applied);
    }
}
