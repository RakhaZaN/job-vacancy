@extends('layouts.main')

@section('page')
    Job Vacancy
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>News & Event</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.store-news') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-12 col-md-4">
                                        <input type="date" name="post_date" id="date" class="form-control" readonly value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col offset-md-1">
                                        <div class="form-group row">
                                            <label for="thumnail" class="col-2 col-form-label text-right">Thumbnail</label>
                                            <div class="col">
                                                <input type="file" name="picture" id="thumbnail" class="form-control @error('picture') is-invalid @enderror">
                                            </div>
                                            @error('picture')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" tabindex="1" required autofocus placeholder="Title">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="body" id="body" rows="20" class="summernote w-100"></textarea>
                                    @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="/home" class="btn btn-light btn-lg mr-3">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-lg">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
