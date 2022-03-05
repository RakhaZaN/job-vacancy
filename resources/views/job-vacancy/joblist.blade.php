@extends('layouts.main')

@section('page')
    Job List
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>{{ $jobs->name }}</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('job-vacancy.index') }}" class="btn btn-light mb-3">Back</a>
            <h5>List of available jobs</h5>
            <div class="d-flex flex-column justify-content-center">

                @if (count($jobs->jobList) == 0)
                    <p class="text-mute">Job vancancies not available</p>
                @else
                    @foreach ($jobs->jobList as $job)
                    @php
                        $qualified = true;
                        // age validatioin
                        $age = explode('-', $job['range_age']);
                        $qualifiedAge = $validation['age'] >= $age[0] && $validation['age'] <= $age[1];

                        $isValidGender = $job['gender'] == $validation['gender'] || $job['gender'] == 'male/female';
                        $qualifiedGender = $isValidGender;

                        $level = [
                            'entry',
                            'officer',
                            'supervisor',
                            'senior',
                            'director',    
                        ];
                        $levelCandidate = array_search($validation['position_level'] ?? 'entry', $level);
                        $levelJob = array_search($job['position_level'], $level);
                        $qualifiedPositionLevel = $levelCandidate >= $levelJob;

                        $degrees = [
                            'sma',
                            'd1',
                            'd2',
                            'd3',
                            's1',
                            's2',
                            's3',
                        ];
                        $degreeCandidate = array_search($validation['education'], $degrees);
                        $degreeJob = array_search($job['education'], $degrees);
                        $qualifiedDegree = $degreeCandidate >= $degreeJob;

                        $qualified = $qualifiedAge && $qualifiedGender && $qualifiedPositionLevel && $qualifiedDegree;

                    @endphp
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ $job->title }}</h4>
                            @if (!$qualified)
                            <small class="text-danger">* You are not qualified</small>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-responsive-sm w-100">
                                        <thead>
                                            <tr>
                                                <th><i>Location</i></th>
                                                <th><i>Major</i></th>
                                                <th><i>Employment type</i></th>
                                                <th><i>Position job</i></th>
                                                <th><i>Job function</i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $job->location }}</td>
                                                <td>{{ $job->major }}</td>
                                                <td>{{ $job->employment_type }}</td>
                                                <td>{{ $job->position_level }}</td>
                                                <td>{{ $job->title }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <small>Active until: {{ $job->active_date }}</small>
                                </div>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#job-detail-{{ $job->id }}">View Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Modal Job Detail --}}
    @foreach ($jobs->jobList as $job)
    <div class="modal fade" id="job-detail-{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Job Detail</h5>
                    @if (!$qualified)
                    <small class="text-danger">* You are not qualified</small>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-right">
                        <small>Active until: {{ $job->active_date }}</small>
                    </div>
                    <h4>{{ $job->title }}</h4>
                    <hr>
                    <table class="table table-responsive-sm w-100">
                        <thead>
                            <tr>
                                <th><i>Location</i></th>
                                <th><i>Major</i></th>
                                <th><i>Position job</i></th>
                                <th><i>Job function</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->major }}</td>
                                <td>{{ $job->position_level }}</td>
                                <td>{{ $job->title }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-responsive-sm w-100">
                        <thead>
                            <tr>
                                <th><i>Education level</i></th>
                                <th><i>Employment type</i></th>
                                <th><i>Age</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $job->education_level ?? '-' }}</td>
                                <td>{{ $job->employment_type }}</td>
                                <td>{{ $job->range_age }} years old</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    {!! $job->description !!}
                </div>
                <div class="modal-footer">
                    @if (auth()->user()->role == 'admin')
                    <a href="{{ route('job-vacancy.edit', ['j' => $job->id]) }}" class="btn btn-warning">Edit</a>
                    @else
                    @if ($qualified)
                    <a href="{{ route('job-vacancy.data', ['j' => $job->id, 'type' => $jobs->name]) }}" class="btn btn-primary">APPLY THIS JOB</a>
                    @endif
                    @endif
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End Modal Job Detail --}}

@endsection
