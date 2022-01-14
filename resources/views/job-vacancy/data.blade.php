@extends('layouts.main')

@section('page')
    Data
@endsection

@section('main-content')

<form action="{{ route('job-vacancy.apply') }}" method="POST" enctype="multipart/form-data">
    @csrf
<section class="section">
        <div class="section-header justify-content-between">
            <h1>{{ $type }}</h1>
        </div>

            <div class="section-body">
                <div class="row justify-content-center">

                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="col-6 col-md-3">
                                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" readonly>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="ava" class="w-100">
                                    </div>
                                    <div class="col">
                                        <h1>{{ auth()->user()->fullname }}</h1>
                                        <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                                        <p><i class="fas fa-map-marker-alt"></i> @if ($detail != null) {{ $detail->address }} {{ $detail->city }}, {{ $detail->provincy }} @endif</p>
                                        <p><i class="fas fa-phone"></i>@if ($detail != null) {{ $detail->phone }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-light">
                                <a href="{{ route('edit-profile') }}">Edit Profile</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                @if ($jobId != 1)
                                <h4 class="card-title">Requirement</h4>
                                @else
                                <h4 class="card-title">Internship Requirement</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="card card-warning">
                                    <div class="card-body">
                                        1. Please fill in your profile field
                                    </div>
                                </div>
                                <div class="card card-warning">
                                    <div class="card-body">
                                        @if ($jobId != 1)
                                        2. Please upload your CV / Resume
                                        @else
                                        2. Please upload your internship application letter
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        @if ($jobId != 1)
                                        <h6>Upload CV / Resume</h6>
                                        @else
                                        <h6 class="card-title">Internship Application Letter</h6>
                                        <p><b>Note:</b> This internship application letter is an official letter from a school or university</p>
                                        @endif
                                        {{-- <input class="form-control" type="file" name="file_attach" id="formFile">
                                        @if ($pathFile != null)
                                        <a href="{{ asset('storage/'. $pathFile) }}" target="_blank" class="btn btn-outline-warning mt-3">Current Attachment</a>
                                        @else
                                        <small class="text-danger">You haven't file uploaded yet</small>
                                        @endif --}}
                                        <button type="button" data-toggle="modal" data-target="#uploadFile" class="btn btn-outline-primary">Upload File</button>
                                        @error('file_attach')
                                        <span class="text-danger">Select your file before apply</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <a href="{{ route('job-vacancy.index') }}" class="btn btn-light ml-2">Cancel</a>
                        <button class="btn btn-primary btn-lg" type="submit">APPlY</button>
                    </div>

                    <input type="hidden" name="job_vacancy_id" value="{{ $jobId }}">
                    <input type="hidden" name="candidate_detail_id" value="{{ auth()->user()->id }}">

                </div>
            </div>
        </section>
        {{-- Modal --}}
        <div class="modal fade" id="uploadFile" tabindex="-2" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-primary">
                            <div class="card-body">
                                <input class="form-control mb-3" type="file" name="file_attach" id="formFile">
                                <h4 class="card-title">File Uploaded</h4>
                                @if ($pathFile == null)
                                <p>No File Uploaded</p>
                                @else
                                <iframe src="{{ asset('storage/'.$pathFile) }}" frameborder="0" class="w-100" height="500px"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close to Apply</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal --}}
    </form>

    <section class="section-footer py-5"></section>


@endsection
