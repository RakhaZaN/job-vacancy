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
                <div class="row justify-content-center">

                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="jobId" value="{{ $jobId }}">
                                    <input type="hidden" name="old_file" value="{{ $pathFile }}">
                                    <input type="file" name="file_attach" id="file_attach" class="form-control @error('file_attach') is-invalid @enderror">
                                    @error('file_attach')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <h4 class="card-title">File Uploaded</h4>
                                @if ($pathFile != null)
                                <iframe src="{{ asset('storage/'.$pathFile) }}" frameborder="0" class="w-100" height="500"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <a href="{{ url()->previous() }}" class="btn btn-light ml-2">Cancel</a>
                        <button class="btn btn-primary btn-lg" type="submit">APPlY</button>
                    </div>

                </div>
            </div>
        </section>
    </form>

    <section class="section-footer py-5"></section>


@endsection
