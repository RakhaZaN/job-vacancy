@extends('layouts.main')

@section('page')
    Job Vacancy
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Job Vacancy</h1>
            <a href="" class="btn btn-outline-success">Applied Job</a>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('./assets/img/avatar/avatar-1.png') }}" alt="..." class="card-img-top">
                            <div class="my-2 text-center">
                                <a href="" class="btn btn-primary stretched-link">Internship</a>
                            </div>
                            <div class="my-2 text-center text-muted">For student who seek for work experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('./assets/img/avatar/avatar-2.png') }}" alt="..." class="card-img-top">
                            <div class="my-2 text-center">
                                <a href="" class="btn btn-primary stretched-link">Fresh Graduate</a>
                            </div>
                            <div class="my-2 text-center text-muted">For student who seek for work experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('./assets/img/avatar/avatar-3.png') }}" alt="..." class="card-img-top">
                            <div class="my-2 text-center">
                                <a href="" class="btn btn-primary stretched-link">Professional</a>
                            </div>
                            <div class="my-2 text-center text-muted">For student who seek for work experience</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection
