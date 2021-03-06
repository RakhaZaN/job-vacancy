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
            @if (auth()->user()->role == 'admin')
            <div class="text-center mb-4">
                <a href="{{ route('job-vacancy.new') }}" class="btn btn-success">New Vacancy</a>
                <a href="{{ route('job-vacancy.submitted') }}" class="btn btn-outline-warning">All File Submitted</a>
            </div>
            @else
            <div class="text-center mb-4">
                <a href="{{ route('job-vacancy.myfile') }}" class="btn btn-success">My Files</a>
            </div>
            @endif
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

                @if (count($nullFileJob) > 0)
                <div class="col-12 d-flex flex-column">
                    <h4>Purpose without attachment</h4>
                    @forelse ($nullFileJob as $job)
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <h5>{{ $job->jobVacancy->title }}</h5>
                            <a href="{{ route('job-vacancy.upload-file', ['j' => $job->jobVacancy->id]) }}" class="btn btn-outline-primary">Upload File</a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                @endif

            </div>
        </div>
    </section>

    @if (auth()->user()->role != 'admin')
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
                    <table class="table table-striped table-responsive-sm w-100">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Employment Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($applies) == 0)
                            <tr>
                                <td colspan="4" class="text-center">Not have job applied yet</td>
                            </tr>
                            @else
                            @foreach ($applies as $apply)
                            <tr>
                                <td>{{ $apply->jobVacancy->title }}</td>
                                <td>{{ $apply->jobVacancy->location }}</td>
                                <td>{{ $apply->jobVacancy->employment_type }}</td>
                                <td>{{ $apply->status }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Applied --}}
    @else
    {{-- Modal Applicants --}}
    <div class="modal fade" id="applicants" tabindex="-1" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Applicants</h5>
                    <a href="{{ route('job-vacancy.file-submitted') }}" class="btn btn-outline-info btn-sm ml-3">See more</a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-responsive-sm w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Applied</th>
                                <th>Job</th>
                                <th>Profile</th>
                                <th>Attachment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applies as $apply)
                            <tr>
                                <td>{{ $apply->candidate->fullname }}</td>
                                <td>{{ $apply->candidate->email }}</td>
                                <td>{{ $apply->jobVacancy->type->name }}</td>
                                <td>{{ $apply->jobVacancy->title }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit-profile', ['id' => $apply->candidate_detail_id]) }}" class="btn btn-success btn-sm">Profile</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ asset('storage/'.$apply->file_attach) }}" target="_blank" class="btn btn-warning btn-sm">view</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.announce', ['pj' => $apply->id]) }}" class="btn btn-info btn-sm">Announce</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Applicants --}}
    @endif


@endsection
