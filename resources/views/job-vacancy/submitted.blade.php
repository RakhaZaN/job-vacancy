@extends('layouts.main')

@section('page')
    Data
@endsection

@section('main-content')

<form action="{{ route('job-vacancy.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
<section class="section">
        <div class="section-header justify-content-between">
            <h1>All Applicants</h1>
        </div>

            <div class="section-body">
                <div class="row justify-content-center">

                    <div class="col-12 col-md-8">
                        <a href="{{ route('job-vacancy.index') }}" class="btn btn-light mb-3">Back</a>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-stripes table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Fullname</th>
                                            <th>Job Title</th>
                                            <th>status</th>
                                            <th>Profile</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $app)
                                        <tr>
                                            <td>{{ $app->date }}</td>
                                            <td>{{ $app->candidate->fullname }}</td>
                                            <td>{{ $app->jobVacancy->title }}</td>
                                            <td><span class="badge @if ($app->status == 'send') badge-warning @else
                                            @if ($app->status == 'confirmed') badge-success @else badge-danger @endif
                                            @endif">{{ $app->status }}</span></td>
                                            <td><a href="{{ route('edit-profile', ['id' => $app->candidate_detail_id]) }}" class="btn btn-success btn-sm">Profile</a></td>
                                            <td><a href="{{ asset('storage/'. $app->file_attach) }}" target="_blank" class="btn btn-warning btn-sm">view</a></td>
                                        </tr>
                                        @empty
                                        <h5>Haven't an applicants yet</h5>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>

    <section class="section-footer py-5"></section>


@endsection

