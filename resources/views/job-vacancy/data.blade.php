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
            <form action="{{ route('job-vacancy.save', ['j' => $jobId]) }}" method="POST">
                @csrf
                <div class="d-flex flex-column justify-content-center">

                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 align-self-center">
                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="ava" class="w-100">
                                </div>
                                <div class="col">
                                    <h1>{{ auth()->user()->fullname }}</h1>
                                    <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $detail->address }} {{ $detail->city }}, {{ $detail->provincy }}</p>
                                    <p><i class="fas fa-phone"></i> {{ $detail->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-light">
                            <a href="{{ route('edit-profile') }}">Edit Profile</a>
                        </div>
                    </div>
                    @if ($is_intern == 0)
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title">Work Experience</h5>
                            <div class="d-flex flex-column">
                                <input class="form-control mb-3" type="text" name="job_title" id="job_title"
                                    placeholder="Job title">
                                <input class="form-control mb-3" type="text" name="company" id="company" placeholder="Company">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="work_from" class="form-label">From</label>
                                            <input type="date" class="form-control" id="work_from" value="" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="work_to" class="form-label">To</label>
                                            <input type="date" class="form-control" id="work_to" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <select class="form-control mb-3" name="job_level" id="job_level">
                                    <option value="" selected disabled>Select your job level</option>
                                    <option value="director">Director / General Manager</option>
                                    <option value="manager">Senior Manager / Manager</option>
                                    <option value="supervisor">Assistant Manager / Supervisor / Coordinator</option>
                                    <option value="stuff">Officer / Stuff</option>
                                    <option value="fresh_graduate">Entry level / Fresh Graduate</option>
                                </select>
                                <div class="form-group mb-3">
                                    <label class="col-form-label">Job Descriptions</label>
                                    <textarea class="form-control" id="job_desc"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title">Education</h5>
                            <div class="d-flex flex-column">
                                <select class="form-control mb-3" name="graduate" id="graduate">
                                    <option value="collage" selected>Graduate from Collage</option>
                                    <option value="high_school">Graduate from High School</option>
                                </select>
                                <select class="form-control mb-3" name="degree" id="degree">
                                    <option value="d1" selected>Associate (Diploma) I</option>
                                    <option value="d2" selected>Associate (Diploma) II</option>
                                    <option value="d3" selected>Associate (Diploma) III</option>
                                    <option value="s1">Bachelor / S1</option>
                                    <option value="s2">Master / S2</option>
                                    <option value="s3">Doctor / S3</option>
                                </select>
                                <input class="form-control mb-3" type="text" name="sch_name" id="sch_name"
                                    placeholder="School / University">
                                <input class="form-control mb-3" type="text" name="major" id="major"
                                    placeholder="Major / Field of study">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="edu_from" class="form-label">From</label>
                                            <input type="date" class="form-control" id="edu_from" value="" required
                                                placeholder="Birth place">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="have_graduate">
                                            <label class="form-check-label" for="have_graduate">
                                                I've graduated
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="last_edu">
                                    <label class="form-check-label" for="last_edu">
                                        Last Education
                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label">Accomplishment or descriptions (optional)</label>
                                    <textarea class="form-control" id="accomplishment"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body" id="skills-wrapper">
                            <div class="row">
                                <h5 class="card-title col">Skill</h5>
                                <div class="col-1 text-center">
                                    <button id="btnAdd" class="btn btn-outline-success btn-sm"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">
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
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title">Resume</h5>
                            <p>Note: Your profile is the first thing recruiters see and not your uploaded resume, so make sure
                                your profile
                                is as complete and detailed as your uploaded resume. </p>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    @else
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title">Education</h5>
                            <div class="d-flex flex-column">
                                <select class="form-control" name="edu_level" id="graduate">
                                    <option value="SMA" @if ($letter != null && $letter->edu_level == 'SMA') selected @endif>SMA/SMK</option>
                                    <option value="Undergraduate" @if ($letter != null && $letter->edu_level == 'Undergraduate') selected @endif>Undergraduate</option>
                                </select>
                                <input class="form-control mt-2" type="text" name="edu_school" id="sch_name" placeholder="School / University" value="{{ $letter != null ? $letter->edu_school : ''  }}">
                                <input class="form-control mt-2" type="text" name="edu_major" id="major" placeholder="Major / Field of study" value="{{ $letter != null ? $letter->edu_major : ''  }}">
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title">Intership Application Letter</h5>
                            <p>Note: This internship application letter is an official letter from a school or university.</p>
                            <input class="form-control" type="file" name="file_attach" id="formFile">
                        </div>
                    </div>
                    @endif
                    <button class="btn btn-primary btn-lg mb-5" type="submit">APPlY</button>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="is_intern" value="{{ $is_intern }}">

                </div>
            </form>
        </div>
    </section>

@endsection

@section('script-page')
<script>
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
</script>
@endsection
