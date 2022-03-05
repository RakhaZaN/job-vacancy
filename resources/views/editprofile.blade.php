@extends('layouts.main')

@section('page')
    Profile
@endsection

@section('main-content')
    <section class="section">
        <div class="section-header">
            @if (auth()->user()->role == 'admin')
            <h1>View Profile</h1>
            @else
            <h1>Edit Profile</h1>
            @endif
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
            <form action="{{ route('saveProfile') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row mb-3">
                    <div class="col offset-md-1">
                        <a href="{{ session()->has('prev') ? session('prev') : $prev }}" class="btn btn-light mr-2">Back</a>
                        @if (auth()->user()->role != 'admin')
                        <input @if (auth()->user()->role == 'admin') readonly @endif type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                        @endif
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" value="{{ $candidate->fullname }}" required placeholder="Full name">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $candidate->email }}" required placeholder="Email">
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
                                            <input @if (auth()->user()->role == 'admin') disabled @endif type="radio" name="gender" value="M" class="selectgroup-input @if (auth()->user()->role == 'admin') readonly @endif" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->gender == "M") checked @endif>
                                            <span class="selectgroup-button">Male</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input @if (auth()->user()->role == 'admin') disabled @endif type="radio" name="gender" value="F" class="selectgroup-input @if (auth()->user()->role == 'admin') readonly @endif" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->gender == "F") checked @endif>
                                            <span class="selectgroup-button">Female</span>
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="birth_date" class="form-label">Birth</label>
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="birth_date" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->dob : old('dob') }}">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->address : old('address') }}" placeholder="Address">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->country : old('country') }}" placeholder="Country">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('provincy') is-invalid @enderror" name="provincy" id="provincy" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->provincy : old('provincy') }}" placeholder="Provincy">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->city : old('city') }}" placeholder="City">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->phone : old('phone') }}" placeholder="Phone number">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" id="post_code" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->post_code : old('post_code') }}" placeholder="Post code">
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
                                            <select @if (auth()->user()->role == 'admin') disabled @endif class="form-control mb-3" name="edu_level" id="edu_level">
                                                <option value="undergraduate" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_level == 'undergraduate') selected @endif>Undergraduate</option>
                                                <option value="hs" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_level == 'hs') selected @endif>Graduate from High School</option>
                                                <option value="collage" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_level == 'collage') selected @endif>Graduate from Collage</option>
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
                                            <select @if (auth()->user()->role == 'admin') disabled @endif class="form-control mb-3" name="edu_degree" id="degree">
                                                <option value="sma" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 'sma') selected @endif>SMA / SMK</option>
                                                <option value="d1" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 'd1') selected @endif>Associate (Diploma) I</option>
                                                <option value="d2" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 'd2') selected @endif>Associate (Diploma) II</option>
                                                <option value="d3" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 'd3') selected @endif>Associate (Diploma) III</option>
                                                <option value="s1" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 's1') selected @endif>Bachelor / S1</option>
                                                <option value="s2" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 's2') selected @endif>Master / S2</option>
                                                <option value="s3" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_degree == 's3') selected @endif>Doctor / S3</option>
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif class="form-control mb-3 @error('edu_school') is-invalid @enderror" type="text" name="edu_school" id="edu_school" placeholder="School / University" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->edu_school : old('edu_school') }}">
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
                                            <select name="edu_major" id="major" class="form-control selectric" @if (auth()->user()->role == 'admin') selected @endif>
                                                <option value="">Choose Your Major</option>
                                                @foreach ($major as $m)
                                                <option @if ($candidate->candidateDetail != null && $candidate->candidateDetail->edu_major == $m) selected @endif value="{{ $m }}">{{ $m }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input @if (auth()->user()->role == 'admin') readonly @endif class="form-control mb-3 @error('edu_major') is-invalid @enderror" type="text" name="edu_major" id="major" placeholder="Major / Field of study" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->edu_major : old('edu_major') }}"> --}}
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="date" class="form-control @error('edu_start') is-invalid @enderror" name="edu_start" id="edu_start" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->edu_start : old('edu_Start') }}">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="date" class="form-control @error('edu_end') is-invalid @enderror" name="edu_end" id="edu_end" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->edu_end : old('edu_end') }}">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('we_title') is-invalid @enderror" name="we_title" id="we_title" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->we_title : old('we_title') }}" placeholder="Title">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="we_company" class="form-control @error('we_company') is-invalid @enderror" name="we_company" id="we_company" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->we_company : old('we_company') }}" placeholder="Company">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="date" class="form-control @error('we_from') is-invalid @enderror" name="we_from" id="we_from" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->we_from : old('we_from') }}">
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
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="date" class="form-control @error('we_to') is-invalid @enderror" name="we_to" id="we_to" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->we_to : old('we_to') }}">
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
                                            <select @if (auth()->user()->role == 'admin') disabled @endif class="form-control mb-3" name="we_job_level" id="we_job_level">
                                                <option value="">Select @if (auth()->user()->role == 'admin') readonly @endif Your Position</option>
                                                <option value="entry" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->we_job_level == 'entry') selected @endif>Entry / Fresh Graduate</option>
                                                <option value="officer" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->we_job_level == 'officer') selected @endif>Officer / Stuff</option>
                                                <option value="supervisor" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->we_job_level == 'supervisor') selected @endif>Assistant Manager / Supervisor / Coordinator</option>
                                                <option value="senior" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->we_job_level == 'senior') selected @endif>Senior Manger / Manager</option>
                                                <option value="director" @if ($candidate->candidateDetail != null && $candidate->candidateDetail->we_job_level == 'director') selected @endif>Director / General Manager</option>
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
                                            <label for="we_description" class="form-label">Description</label>
                                            <input @if (auth()->user()->role == 'admin') readonly @endif type="text" class="form-control @error('we_description') is-invalid @enderror" name="we_description" id="we_description" value="{{ $candidate->candidateDetail != null? $candidate->candidateDetail->we_description : old('we_description') }}" placeholder="description">
                                            @error('we_description')
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
                        {{-- Skills --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <h4 class="card-title col">Skills</h4>
                                    @if (auth()->user()->role != 'admin')
                                    <div class="col-1 text-center">
                                        <button type="button" id="btnAdd" class="btn btn-outline-success btn-sm"><i class="fas fa-plus"></i></button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body increment">
                                @if ($candidate->candidateDetail != null && count($candidate->candidateDetail->skills) > 0)
                                @for ($i = 0; $i < count($candidate->candidateDetail->skills); $i++)
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <input @if (auth()->user()->role == 'admin') readonly @endif class="form-control" type="text" name="skill_name[]" id="skill_name" placeholder="Add a skill" value="{{ $candidate->candidateDetail->skills[$i][0] }}">
                                    </div>
                                    <div class="col-5">
                                        <select @if (auth()->user()->role == 'admin') disabled @endif class="form-control" name="skill_level[]" id="skill_lavel">
                                            <option value="basic" @if ($candidate->candidateDetail->skills[$i][1] == 'basic') selected @endif>Basic</option>
                                            <option value="intermediate" @if ($candidate->candidateDetail->skills[$i][1] == 'intermediate') selected @endif>Intermediate</option>
                                            <option value="expert" @if ($candidate->candidateDetail->skills[$i][1] == 'expert') selected @endif>Expert</option>
                                        </select>
                                    </div>
                                    @if (auth()->user()->role != 'admin')
                                    <div class="col text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-rm"><i class="fas fa-minus"></i></button>
                                    </div>
                                    @endif
                                </div>
                                @endfor
                                @else
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <input @if (auth()->user()->role == 'admin') readonly @endif class="form-control" type="text" name="skill_name[]" id="skill_name" placeholder="Add a skill" value="">
                                    </div>
                                    <div class="col-5">
                                        <select @if (auth()->user()->role == 'admin') readonly @endif class="form-control" name="skill_level[]" id="skill_lavel">
                                            <option value="basic">Basic</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                    </div>
                                    <div class="col text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-rm"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->role != 'admin')
                    <div class="col-12 col-md-10 text-right">
                        <button type="submit" class="btn btn-primary">Save Change</button>
                        <input @if (auth()->user()->role == 'admin') readonly @endif type="hidden" name="previous_url" value="{{ url()->previous() }}">
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <section class="section-footer py-5"></section>

@endsection

@section('script-page')
<div class="clone d-none">
    <div class="row mb-2">
        <div class="col-6">
            <input @if (auth()->user()->role == 'admin') readonly @endif class="form-control" type="text" name="skill_name[]" id="skill_name" placeholder="Add a skill" value="">
        </div>
        <div class="col-5">
            <select @if (auth()->user()->role == 'admin') disabled @endif class="form-control" name="skill_level[]" id="skill_lavel">
                <option value="basic">Basic</option>
                <option value="intermediate">Intermediate</option>
                <option value="expert">Expert</option>
            </select>
        </div>
        <div class="col text-center">
            <button type="button" class="btn btn-outline-danger btn-sm btn-rm"><i class="fas fa-minus"></i></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#btnAdd').click(function () {
            const inpSkill = $('.clone').html()
            $('.increment').append(inpSkill)
        })

        $('body').on('click', '.btn-rm', function () {
            $(this).closest('.row').remove()
        })
    })
</script>
@endsection
