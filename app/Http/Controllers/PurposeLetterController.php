<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\PurposeLetter;
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
        if ($data != null) {
            return 'ok';
            return view('job-vacancy.data')
            ->with('type', $request->type)
            ->with('is_intern', $typeId)
            ->with('detail', $candidate)
            ->with('letter', $data)
            ->with('jobId', $jobId);
        }
        return view('job-vacancy.data')
        ->with('type', $request->type)
        ->with('is_intern', $typeId)
        ->with('detail', $candidate);
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
