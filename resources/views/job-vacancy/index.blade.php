@extends('layouts.main')

@section('page')
    Job Vacancy
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Job Vacancy</h1>
            @if (auth()->user()->role == 'admin')
            <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#applicants">All Applicants</button>
            @else
            <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#applied_job">Applied Job</button>
            @endif
        </div>

        <div class="section-body">
            {{-- Alerts --}}
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>x</span></button>
                </div>
            @endif
            {{-- End Alerts --}}
            <div class="row justify-content-center">

                @if ($job_type == null)
                <div class="col">
                    <p class="text-mute">Job types not available</p>
                </div>
                @else
                    @foreach ($job_type as $type)
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset($type->image) }}" alt="..." class="card-img-top">
                                <div class="my-2 text-center">
                                    <a href="{{ route('job-vacancy.joblist', ['type' => $type->name]) }}" class="btn btn-primary stretched-link">{{ $type->name }}</a>
                                </div>
                                <div class="my-2 text-center text-muted">{{ $type->short_desc }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    {{-- Modal Applied --}}
    <div class="modal fade" id="applied_job" tabindex="-1" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Applied Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Applied</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Injilia Ratuntiga i</td>
                                <td>injil.r3@gmail.com </td>
                                <td>Female</td>
                                <td>17/07/00</td>
                                <td>Intership</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary">APPLY THIS JOB</button> --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Applied --}}

    {{-- Modal Applicants --}}
    <div class="modal fade" id="applicants" tabindex="-1" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">All Applicants</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Applied</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Injilia Ratuntiga i</td>
                                <td>injil.r3@gmail.com </td>
                                <td>Female</td>
                                <td>17/07/00</td>
                                <td>Intership</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary">APPLY THIS JOB</button> --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Applicants --}}

@endsection
