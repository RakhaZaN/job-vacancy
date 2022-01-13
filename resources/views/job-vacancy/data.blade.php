@extends('layouts.main')

@section('page')
    Data
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>{{ $type }}</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('job-vacancy.apply') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">

                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="col-6 col-md-3">
                                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" readonly>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="ava" class="w-100">
                                    </div>
                                    <div class="col">
                                        <h1>{{ auth()->user()->fullname }}</h1>
                                        <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                                        <p><i class="fas fa-map-marker-alt"></i> @if ($detail != null) {{ $detail->address }} {{ $detail->city }}, {{ $detail->provincy }} @endif</p>
                                        <p><i class="fas fa-phone"></i>@if ($detail != null) {{ $detail->phone }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-light">
                                <a href="{{ route('edit-profile') }}">Edit Profile</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="card card-warning">
                            <div class="card-body">
                                Please fill in your profile field first!
                            </div>
                        </div>
                    </div>
                    @if ($detail != null)
                        @if ($jobId != 1)

                        <div class="col-12 col-md-8">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Work Experience</h5>
                                    <div class="d-flex flex-column">
                                        <input class="form-control mb-3" type="text" id="job_title" value="{{ $detail['we_title'] }}" disabled>
                                        <input class="form-control mb-3" type="text" id="company" value="{{ $detail['we_company'] }}" disabled>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="work_from" class="form-label">From</label>
                                                    <input type="date" class="form-control" id="work_from" value="{{ $detail['we_from'] }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="work_to" class="form-label">To</label>
                                                    <input type="date" class="form-control" id="work_to" value="{{ $detail['we_to'] }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <select class="form-control mb-3" name="job_level" id="job_level" disabled>
                                            <option value="" selected>Select your job level</option>
                                            <option value="director" @if ($detail->we_job_level == 'director') selected @endif>Director / General Manager</option>
                                            <option value="manager" @if ($detail->we_job_level == 'manager') selected @endif>Senior Manager / Manager</option>
                                            <option value="supervisor" @if ($detail->we_job_level == 'sipervisor') selected @endif>Assistant Manager / Supervisor / Coordinator</option>
                                            <option value="officer" @if ($detail->we_job_level == 'officer') selected @endif>Officer / Stuff</option>
                                            <option value="fresh_graduate" @if ($detail->we_job_level == 'entry') selected @endif>Entry level / Fresh Graduate</option>
                                        </select>
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Job Descriptions</label>
                                            <article name="description" id="description">{{ $detail['we_description'] }}</article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Education</h5>
                                    <div class="d-flex flex-column">
                                        <select class="form-control mb-3" name="edu_level" id="edu_level" disabled>
                                            <option value="undergraduate" @if ($detail['edu_level'] == 'undergraduate') selected @endif>Undergraduate</option>
                                            <option value="hs" @if ($detail['edu_level'] == 'hs') selected @endif>Graduate from High School</option>
                                            <option value="collage" @if ($detail['edu_level'] == 'collage') selected @endif>Graduate from Collage</option>
                                        </select>
                                        <select class="form-control mb-3" name="edu_degree" id="degree" disabled>
                                            <option value="sma" @if ($detail['edu_degree'] == 'sma') selected @endif>SMA / SMK</option>
                                            <option value="d1" @if ($detail['edu_degree'] == 'd1') selected @endif>Associate (Diploma) I</option>
                                            <option value="d2" @if ($detail['edu_degree'] == 'd2') selected @endif>Associate (Diploma) II</option>
                                            <option value="d3" @if ($detail['edu_degree'] == 'd3') selected @endif>Associate (Diploma) III</option>
                                            <option value="s1" @if ($detail['edu_degree'] == 's1') selected @endif>Bachelor / S1</option>
                                            <option value="s2" @if ($detail['edu_degree'] == 's2') selected @endif>Master / S2</option>
                                            <option value="s3" @if ($detail['edu_degree'] == 's3') selected @endif>Doctor / S3</option>
                                        </select>
                                        <input class="form-control mb-3" type="text" name="sch_name" id="sch_name" value="{{ $detail['edu_school'] }}" disabled>
                                        <input class="form-control mb-3" type="text" name="major" id="major" value="{{ $detail['edu_major'] }}" disabled>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="edu_from" class="form-label">Start</label>
                                                    <input type="date" class="form-control" id="edu_from" value="{{ $detail['edu_start'] }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="edu_from" class="form-label">End</label>
                                                    <input type="date" class="form-control" id="edu_from" value="{{ $detail['edu_end'] }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="card card-primary">
                                <div class="card-body" id="skills-wrapper">
                                    <div class="row">
                                        <h5 class="card-title col">Skills</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" type="text" name="skill_name[]" id="skill_name" placeholder="Add a skill" disabled>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-control" name="skill_level[]" id="skill_lavel" disabled>
                                                <option value="basic">Basic</option>
                                                <option value="intermediate">Intermediate</option>
                                                <option value="expert">Expert</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Resume</h5>
                                    <p>Note: Your profile is the first thing recruiters see and not your uploaded resume, so make sure
                                        your profile
                                        is as complete and detailed as your uploaded resume. </p>
                                    <div class="form-group">
                                        <input class="form-control @error('file_attach') is-invalid @enderror" type="file" id="formFile" name="file_attach">
                                        @error('file_attach')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else

                        <div class="col-12 col-md-8">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Education</h5>
                                    <div class="d-flex flex-column">
                                        <select class="form-control" id="graduate" disabled>
                                            <option value="undergraduate" @if ($detail->edu_level == 'Undergraduate') selected @endif>Undergraduate</option>
                                        </select>
                                        <input class="form-control mt-2" type="text" id="sch_name" placeholder="School / University" value="{{ $detail->edu_school }}" disabled>
                                        <input class="form-control mt-2" type="text" id="major" placeholder="Major / Field of study" value="{{ $detail->edu_major }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Intership Application detail</h5>
                                    <p>Note: This internship application detail is an official detail from a school or university.</p>
                                    <input class="form-control" type="file" name="file_attach" id="formFile">
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-12 col-md-8">
                            <a href="{{ route('job-vacancy.index') }}" class="btn btn-light ml-2">Cancel</a>
                            <button class="btn btn-primary btn-lg" type="submit">APPlY</button>
                        </div>

                        <input type="hidden" name="job_vacancy_id" value="{{ $jobId }}">
                        <input type="hidden" name="candidate_detail_id" value="{{ auth()->user()->id }}">
                    @endif

                </div>
            </form>
        </div>
    </section>

    <section class="section-footer py-5"></section>

@endsection

@section('script-page')
{{-- <script>
    $('#btnAdd').on('click', function () {
        // alert('oke')
        $('#skills-wrapper').append(`<div class="row mt-2">
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
            <div class="col text-center"><button onclick="rm()" class="btn btn-outline-danger btn-sm"><i class="fas fa-minus"></i></button></div>
        </div>`)
    })


    function rm() {
        $(this).closest('.row').remove()
    }
</script> --}}
@endsection
