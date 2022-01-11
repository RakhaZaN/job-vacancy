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
            <form action="{{ route('auth.register') }}" method="post">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <input id="fullname" type="text" class="form-control" name="fullname" tabindex="1" required
                                        autofocus placeholder="Full Name">
                                    <div class="invalid-feedback">
                                        Please fill in your full name
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                        autofocus placeholder="Email Address">
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                        required placeholder="Password">
                                    <div class="invalid-feedback">
                                        Please fill in your password
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="admin">
                            <div class="card-footer text-right">
                                <a href="{{ route('home') }}" class="btn btn-light btn-lg mr-3">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
