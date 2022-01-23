@extends('layouts.main')

@section('page')
    Data
@endsection

@section('main-content')

<form action="{{ route('job-vacancy.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
<section class="section">
        <div class="section-header justify-content-between">
            <h1>Upload File</h1>
        </div>

            <div class="section-body">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>x</span></button>
                    </div>
                @endif
                <div class="row justify-content-center">

                    <div class="col-12 col-md-8 mb-3">
                        <a href="{{ url()->previous() }}" class="btn btn-light ml-2">Cancel</a>
                    </div>`
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <input type="hidden" name="jobId" value="{{ $jobId }}">
                                    <div class="input-group">
                                        <input type="file" name="file_attach" id="file_attach" class="form-control @error('file_attach') is-invalid @enderror">
                                        <button class="btn btn-primary btn-lg" type="submit">Upload</button>
                                    </div>
                                    @error('file_attach')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <h4 class="card-title">File Uploaded</h4>
                                <div class="row">
                                    @forelse ($data as $file)
                                    <div class="col-6 col-md-3">
                                        <div class="card">
                                            <iframe src="{{ asset('storage/'. $file->filename) }}" class="w-100"></iframe>
                                            <div class="card-body d-flex justify-content-between">
                                                <a href="{{ asset('storage/'. $file->filename) }}" target="_blank" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('job-vacancy.data', ['j' => $jobId, 'selected' => $file->filename]) }}" class="btn btn-success">Select</a>
                                                <form action="{{ route('job-vacancy.del-upload') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $file->id }}">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">No file uploaded yet</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>

    <section class="section-footer py-5"></section>


@endsection
