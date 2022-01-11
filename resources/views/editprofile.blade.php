@extends('layouts.main')

@section('page')
    Edit Profile
@endsection

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
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
            <form action="{{ route('saveProfile') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row mb-3">
                    <div class="col offset-md-1">
                        <a href="{{ url('/home') }}" class="btn btn-light mr-2">Back to Home</a>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        {{-- Profile card --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="fullname" class="form-label">First name</label>
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" value="{{ auth()->user()->fullname }}" required placeholder="Full name">
                                            @error('fullname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ auth()->user()->email }}" required placeholder="Email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="" class="form-label d-block">Gender</label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="M" class="selectgroup-input" @if ($candidate_detail != null && $candidate_detail['gender'] == "M") checked @endif>
                                            <span class="selectgroup-button">Male</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="F" class="selectgroup-input" @if ($candidate_detail != null && $candidate_detail['gender'] == "F") checked @endif>
                                            <span class="selectgroup-button">Female</span>
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="birth_date" class="form-label">Birth</label>
                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="birth_date" value="{{ $candidate_detail != null? $candidate_detail['dob'] : '' }}">
                                            @error('dob')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $candidate_detail != null? $candidate_detail['address'] : '' }}" placeholder="Address">
                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ $candidate_detail != null? $candidate_detail['country'] : '' }}" placeholder="Country">
                                            @error('country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="provincy" class="form-label">Provincy</label>
                                            <input type="text" class="form-control @error('provincy') is-invalid @enderror" name="provincy" id="provincy" value="{{ $candidate_detail != null? $candidate_detail['provincy'] : '' }}" placeholder="Provincy">
                                            @error('provincy')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ $candidate_detail != null? $candidate_detail['city'] : '' }}" placeholder="City">
                                            @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $candidate_detail != null? $candidate_detail['phone'] : '' }}" placeholder="Phone number">
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="post_code" class="form-label"></label>
                                            <input type="number" class="form-control @error('post_code') is-invalid @enderror" name="post_code" id="post_code" value="{{ $candidate_detail != null? $candidate_detail['post_code'] : '' }}" placeholder="Post code">
                                            @error('post_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        {{-- Education card --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Education</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="edu_level" class="form-label">Level</label>
                                            <select class="form-control mb-3" name="edu_level" id="edu_level">
                                                <option value="undergraduate" @if ($candidate_detail['edu_level'] == 'undergraduate') selected @endif>Undergraduate</option>
                                                <option value="hs" @if ($candidate_detail['edu_level'] == 'hs') selected @endif>Graduate from High School</option>
                                                <option value="collage" @if ($candidate_detail['edu_level'] == 'collage') selected @endif>Graduate from Collage</option>
                                            </select>
                                            @error('edu_level')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="degree" class="form-label">Degree</label>
                                            <select class="form-control mb-3" name="edu_degree" id="degree">
                                                <option value="sma" @if ($candidate_detail['edu_degree'] == 'sma') selected @endif>SMA / SMK</option>
                                                <option value="d1" @if ($candidate_detail['edu_degree'] == 'd1') selected @endif>Associate (Diploma) I</option>
                                                <option value="d2" @if ($candidate_detail['edu_degree'] == 'd2') selected @endif>Associate (Diploma) II</option>
                                                <option value="d3" @if ($candidate_detail['edu_degree'] == 'd3') selected @endif>Associate (Diploma) III</option>
                                                <option value="s1" @if ($candidate_detail['edu_degree'] == 's1') selected @endif>Bachelor / S1</option>
                                                <option value="s2" @if ($candidate_detail['edu_degree'] == 's2') selected @endif>Master / S2</option>
                                                <option value="s3" @if ($candidate_detail['edu_degree'] == 's3') selected @endif>Doctor / S3</option>
                                            </select>
                                            @error('edu_degree')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="edu_school" class="form-label">Name</label>
                                            <input class="form-control mb-3" type="text" name="edu_school" id="edu_school" placeholder="School / University" value="{{ $candidate_detail['edu_school'] }}">
                                            @error('edu_school')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="major" class="form-label">Major</label>
                                            <input class="form-control mb-3" type="text" name="edu_major" id="major" placeholder="Major / Field of study" value="{{ $candidate_detail['edu_major'] }}">
                                            @error('edu_major')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="edu_start" class="form-label">Start</label>
                                            <input type="date" class="form-control" name="edu_start" id="edu_start" value="{{ $candidate_detail['edu_start'] }}">
                                            @error('edu_start')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="edu_end" class="form-label">End</label>
                                            <input type="date" class="form-control" name="edu_end" id="edu_end" value="{{ $candidate_detail['edu_end'] }}">
                                            @error('edu_end')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        {{-- Work Experience card --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Work Experiences</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="we_title" class="form-label">Title</label>
                                            <input type="text" class="form-control @error('we_title') is-invalid @enderror" name="we_title" id="we_title" value="{{ $candidate_detail['we_title'] }}" placeholder="Title">
                                            @error('we_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="we_company" class="form-label">Company</label>
                                            <input type="we_company" class="form-control @error('we_company') is-invalid @enderror" name="we_company" id="we_company" value="{{ $candidate_detail['we_company'] }}" placeholder="Company">
                                            @error('we_company')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="we_from" class="form-label">From</label>
                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="we_from" id="we_from" value="{{ $candidate_detail['we_from'] }}">
                                            @error('we_from')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="we_to" class="form-label">To</label>
                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="we_to" id="we_to" value="{{ $candidate_detail['we_to'] }}">
                                            @error('we_to')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="we_job_level" class="form-label">Level</label>
                                            <select class="form-control mb-3" name="we_job_level" id="we_job_level">
                                                <option value="entry" @if ($candidate_detail['we_job_level'] == 'entry') selected @endif>Entry / Fresh Graduate</option>
                                                <option value="officer" @if ($candidate_detail['we_job_level'] == 'officer') selected @endif>Officer / Stuff</option>
                                                <option value="supervisor" @if ($candidate_detail['we_job_level'] == 'supervisor') selected @endif>Assistant Manager / Supervisor / Coordinator</option>
                                                <option value="senior" @if ($candidate_detail['we_job_level'] == 'senior') selected @endif>Senior Manger / Manager</option>
                                                <option value="director" @if ($candidate_detail['we_job_level'] == 'director') selected @endif>Director / General Manager</option>
                                            </select>
                                            @error('we_job_level')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="we_description" class="form-label">we_description</label>
                                            <input type="text" class="form-control @error('we_description') is-invalid @enderror" name="we_description" id="we_description" value="{{ $candidate_detail['we_description'] }}" placeholder="we_description">
                                            @error('we_description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        {{-- Skills --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <h4 class="card-title col">Skill</h4>
                                    <div class="col-1 text-center">
                                        <button type="button" id="btnAdd" class="btn btn-outline-success btn-sm"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="skills-wrapper">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="skills[]" id="skill_name" placeholder="Add a skill" value="">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-control" name="skills[]" id="skill_lavel">
                                            <option value="basic">Basic</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                    </div>
                                    <div class="col text-center"><button type="button" onclick="rm()" class="btn btn-outline-danger btn-sm"><i class="fas fa-minus"></i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="section-footer py-5"></section>

@endsection

@section('script-page')
<script>
    $('#btnAdd').on('click', function () {
        // alert('oke')
        $('#skills-wrapper').append(`<div class="row mb-2">
            <div class="col-6">
                <input class="form-control" type="text" name="skill_name[]" id="skill_name" placeholder="Add a skill">
            </div>
            <div class="col-5">
                <select class="form-control" name="skill_level[]" id="skill_lavel">
                    <option value="basic">Basic</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="expert">Expert</option>
                </select>
            </div>
            <div class="col text-center"><button type="button" onclick="rm()" class="btn btn-outline-danger btn-sm"><i class="fas fa-minus"></i></button></div>
        </div>`)
    })


    function rm() {
        $(this).closest('.row.mb-2').remove()
    }
</script>
@endsection
