@extends('layouts.main')

@section('page')
    Data
@endsection

@section('main-content')

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
                        <form action="{{ route('job-vacancy.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="jobId" value="{{ $jobId }}">
                                <div class="input-group">
                                    <input type="file" name="filename" id="filename" class="form-control @error('filename') is-invalid @enderror">
                                    <button class="btn btn-primary btn-lg" type="submit">Upload</button>
                                </div>
                                @error('filename')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </form>
                        <h4 class="card-title">File Uploaded</h4>
                        <div class="row">
                            @forelse ($data as $file)
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <iframe src="{{ asset('storage/'. $file->filename) }}" class="w-100"></iframe>
                                    <div class="card-body d-flex justify-content-center">
                                        <a href="{{ asset('storage/'. $file->filename) }}" target="_blank" class="btn btn-warning btn-sm mr-2"><i class="fas fa-eye"></i></a>
                                        @if ($jobId != null)
                                        <a href="{{ route('job-vacancy.data', ['j' => $jobId, 'selected' => $file->filename]) }}" class="btn btn-success btn-sm">Select</a>
                                        @endif
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
</section>

    <section class="section-footer py-5"></section>


@endsection
