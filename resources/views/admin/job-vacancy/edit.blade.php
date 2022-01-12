@extends('layouts.main')

@section('page')
    Job Vacancy
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Job Vacancy</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('job-vacancy.update') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-sm-4">
                                        <div class="form-group">
                                            <label for="active_date" class="col-form-label">Active Date</label>
                                            <input type="date" name="active_date" id="active_date" class="form-control @error('active_date') is-invalid @enderror" value="{{ $job['active_date'] }}">
                                        </div>
                                    </div>
                                    <div class="col-4 offset-2 offset-md-4">
                                        <div class="form-group">
                                            <label for="type_id" class="col-form-label">Type</label>
                                            <select name="type_id" id="type_id" class="form-control selectric">
                                                {{-- <option value="1" selected>Internship</option> --}}
                                                <option value="2" @if ($job['type_id'] == 2) selected @endif>Fresh Graduate</option>
                                                <option value="3" @if ($job['type_id'] == 3) selected @endif>Professional</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Job Title</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" tabindex="1" required autofocus placeholder="Title" value="{{ $job['title'] }}">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="location" class="col-form-label">Location</label>
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" tabindex="1" required autofocus placeholder="Location" value="{{ $job['location'] }}">
                                    @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="major" class="col-form-label">Major</label>
                                    <input id="major" type="text" class="form-control @error('location') is-invalid @enderror" name="major" tabindex="1" required autofocus placeholder="Major" value="{{ $job['major'] }}">
                                    @error('major')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="employment_type" class="col-form-label">Employment Type</label>
                                    <select name="employment_type" id="employment_type" class="form-control selectric @error('employment_type') is-invalid @enderror">
                                        <option value="contract" @if ($job['employment_type'] == 'contract') selected @endif>Contract</option>
                                        <option value="regular" @if ($job['employment_type'] == 'regular') selected @endif>Regular</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="education_level" class="col-form-label">Education</label>
                                    <select name="education_level" id="education_level" class="form-control selectric">
                                        <option value="">No Minimum</option>
                                        <option value="d1" @if ($job['education_level'] == 'd1') selected @endif>Associate (Diploma) 1</option>
                                        <option value="d2" @if ($job['education_level'] == 'd2') selected @endif>Associate (Diploma) 2</option>
                                        <option value="d3" @if ($job['education_level'] == 'd3') selected @endif>Associate (Diploma) 3</option>
                                        <option value="d4" @if ($job['education_level'] == 'd4') selected @endif>Associate (Diploma) 4</option>
                                        <option value="s1" @if ($job['education_level'] == 's1') selected @endif>Bachelor / S1</option>
                                        <option value="s2" @if ($job['education_level'] == 's2') selected @endif>Master / S2</option>
                                        <option value="s3" @if ($job['education_level'] == 's3') selected @endif>Doctor / S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="position_level" class="col-form-label">Position</label>
                                    <select name="position_level" id="position_level" class="form-control selectric">
                                        <option value="entry" @if ($job['position_level'] == 'entry') selected @endif>Entry Level / Fresh Graduate</option>
                                        <option value="officer" @if ($job['position_level'] == 'officer') selected @endif>Officer / Stuff</option>
                                        <option value="supervisor" @if ($job['position_level'] == 'supervisor') selected @endif>Assistant Manager / Supervisor / Coordinator</option>
                                        <option value="senior" @if ($job['position_level'] == 'senior') selected @endif>Senior Manager / Manager</option>
                                        <option value="director" @if ($job['position_level'] == 'director') selected @endif>Director / General Manager</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Job Desription</label>
                                    <textarea name="description" id="description" rows="20" class="summernote w-100 @error('description') is-invalid @enderror">
                                        {!! $job['description'] !!}
                                    </textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" value="{{ $job->id }}">
                            <div class="card-footer text-right">
                                <a href="{{ url('/home') }}" class="btn btn-light btn-lg mr-3">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
