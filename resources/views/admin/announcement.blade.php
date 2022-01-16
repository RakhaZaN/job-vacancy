@extends('layouts.main')

@section('page')
    Job Vacancy
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Announcement</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.post.announce') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-6 col-sm-4">
                                        <input type="date" name="date" id="date" class="form-control" readonly value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-4 offset-2 offset-md-4">
                                        <select name="status" id="status" class="form-control selectric">
                                            <option disabled selected>Send</option>
                                            <option value="confirmed">Confirm</option>
                                            <option value="rejected">Reject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="title" type="text" class="form-control" name="title" tabindex="1" required autofocus placeholder="Title" value="{{ old('title') }}">
                                    <div class="invalid-feedback">
                                        Please fill in your full name
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="announcement" id="announcement" rows="20" class="summernote w-100" placeholder="Announcement">{{ old('announcement') }}</textarea>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="/home" class="btn btn-light btn-lg mr-3">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-lg">Publish</button>
                            </div>
                            <input type="hidden" name="purpose_job_id" value="{{ $pj }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
