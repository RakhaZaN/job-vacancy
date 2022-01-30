@extends('layouts.main')

@section('page')
    My File
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header">
            <div id="">
                <h1>My Files</h1>
            </div>
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
                <div class="col-12 col-md-8">
                    <a href="{{ route('job-vacancy.index') }}" class="btn btn-light mb-3">Back</a>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-12 col-md-1">
                                    <label for="uploadfile" class="form-label">New File</label>
                                </div>
                                <div class="col">
                                    <form action="{{ route('job-vacancy.upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="back" value="1">
                                        <div class="input-group">
                                            <input type="file" name="filename" id="filename" class="form-control @error('filename') is-invalid @enderror">
                                            <button class="btn btn-primary btn-lg" type="submit">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table table-responsive-sm table-stiped w-100">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Uploaded at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($files as $file)
                                    <tr>
                                        <td>
                                            {{-- <iframe src="{{ asset('storage/'. $file->filename) }}" frameborder="0"></iframe> --}}
                                            {{ explode('/',$file->filename)[1] }}
                                        </td>
                                        <td>{{ $file->upload_at }}</td>
                                        <td width="200">
                                            <form action="{{ route('job-vacancy.del-upload') }}" method="POST">
                                                @csrf
                                                <a href="{{ asset('storage/'. $file->filename) }}" target="_blank" class="btn btn-warning btn-sm">View</a>
                                                <input type="hidden" name="id" value="{{ $file->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">Not any file uploaded yet</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
