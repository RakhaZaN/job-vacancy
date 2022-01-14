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
                    </div>
                    @if ($jobId != 1)

                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Requirement</h4>
                            </div>
                            <div class="card-body">
                                <div class="card card-warning">
                                    <div class="card-body">
                                        1. Please fill in your profile field
                                    </div>
                                </div>
                                <div class="card card-warning">
                                    <div class="card-body">
                                        2. Please upload your CV / Resume
                                    </div>
                                </div>
                                <div class="card card-info">
                                    <div class="card-body">
                                        <h6 class="card-title">Upload CV / Resume</h6>
                                        <input class="form-control" type="file" name="file_attach" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Internship Requirement</h4>
                            </div>
                            <div class="card-body">
                                <div class="card card-warning">
                                    <div class="card-body">
                                        1. Please fill in your profile field
                                    </div>
                                </div>
                                <div class="card card-warning">
                                    <div class="card-body">
                                        2. Please upload your internship application letter
                                    </div>
                                </div>
                                <div class="card card-info">
                                    <div class="card-body">
                                        <h6 class="card-title">Internship Application Letter</h6>
                                        <small><b>Note:</b> This internship application letter is an official letter from a school or university</small>
                                        <input class="form-control" type="file" name="file_attach" id="formFile">
                                    </div>
                                </div>
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
