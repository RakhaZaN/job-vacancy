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
            <h5>List of available jobs</h5>
            <div class="d-flex flex-column justify-content-center">

                @if (count($jobs->jobList) == 0)
                    <p class="text-mute">Job vancancies not available</p>
                @else
                    @foreach ($jobs->jobList as $job)
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ $job->title }}</h4>
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
                    <a href="{{ route('job-vacancy.data', ['j' => $job->id, 'type' => $jobs->name]) }}" class="btn btn-primary">APPLY THIS JOB</a>
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End Modal Job Detail --}}

@endsection
