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
            <form action="{{ route('job-vacancy.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-sm-4">
                                        <div class="form-group">
                                            <label for="active_date" class="col-form-label">Active Date</label>
                                            <input type="date" name="active_date" id="active_date" class="form-control @error('active_date') is-invalid @enderror" value="{{ old('active_date') }}">
                                            @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 offset-2 offset-md-4">
                                        <div class="form-group">
                                            <label for="type_id" class="col-form-label">Type</label>
                                            <select name="type_id" id="type_id" class="form-control selectric">
                                                {{-- <option value="1" selected>Internship</option> --}}
                                                <option value="2">Fresh Graduate</option>
                                                <option value="3">Professional</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Job Title</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" tabindex="1" required autofocus placeholder="Title" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="location" class="col-form-label">Location</label>
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" tabindex="1" required autofocus placeholder="Location" value="{{ old('location') }}">
                                    @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="major" class="col-form-label">Major</label>
                                    <select name="major" id="major" class="form-control selectric">
                                        <option value="All Major">All Major</option>
                                        @foreach ($major as $m)
                                        <option value="{{ $m }}">{{ $m }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="major" type="text" class="form-control @error('location') is-invalid @enderror" name="major" tabindex="1" required autofocus placeholder="Major" value="{{ old('major') }}"> --}}
                                    @error('major')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="employment_type" class="col-form-label">Employment Type</label>
                                    <select name="employment_type" id="employment_type" class="form-control selectric @error('employment_type') is-invalid @enderror">
                                        <option value="contract">Contract</option>
                                        <option value="regular">Regular</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="education_level" class="col-form-label">Education</label>
                                    <select name="education_level" id="education_level" class="form-control selectric">
                                        <option value="">No Minimum</option>
                                        <option value="d1">Associate (Diploma) 1</option>
                                        <option value="d2">Associate (Diploma) 2</option>
                                        <option value="d3">Associate (Diploma) 3</option>
                                        <option value="d4">Associate (Diploma) 4</option>
                                        <option value="s1">Bachelor / S1</option>
                                        <option value="s2">Master / S2</option>
                                        <option value="s3">Doctor / S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="position_level" class="col-form-label">Position</label>
                                    <select name="position_level" id="position_level" class="form-control selectric">
                                        <option value="entry">Entry Level / Fresh Graduate</option>
                                        <option value="officer">Officer / Stuff</option>
                                        <option value="supervisor">Assistant Manager / Supervisor / Coordinator</option>
                                        <option value="senior">Senior Manager / Manager</option>
                                        <option value="director">Director / General Manager</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="range_age" class="col-form-label">Range age</label>
                                    <input id="range_age" type="text" class="form-control @error('range_age') is-invalid @enderror" name="range_age" tabindex="1" required autofocus placeholder="20-30" value="{{ old('range_age') }}">
                                    @error('range_age')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Job Description</label>
                                    <textarea name="description" id="description" rows="20" class="summernote w-100 @error('description') is-invalid @enderror">
                                        <h3>Requirement</h3>
                                        <ul>
                                            <li></li>
                                        </ul>
                                        <h3>Responsibilities</h3>
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ url('/home') }}" class="btn btn-light btn-lg mr-3">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-lg">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
