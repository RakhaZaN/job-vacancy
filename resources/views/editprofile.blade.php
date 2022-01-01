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
            <div class="card card-primary">
                <form action="{{ route('saveProfile') }}" method="POST" class="row g-2 needs-validation" novalidate>
                    @csrf
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
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="birth_date" value="{{ $candidate_detail != null? $candidate_detail['dob'] : '' }}" required>
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
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $candidate_detail != null? $candidate_detail['address'] : '' }}" required placeholder="Address">
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
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ $candidate_detail != null? $candidate_detail['country'] : '' }}" required placeholder="Country">
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
                                    <input type="text" class="form-control @error('provincy') is-invalid @enderror" name="provincy" id="provincy" value="{{ $candidate_detail != null? $candidate_detail['provincy'] : '' }}" required placeholder="Provincy">
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
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ $candidate_detail != null? $candidate_detail['city'] : '' }}" required placeholder="City">
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
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $candidate_detail != null? $candidate_detail['phone'] : '' }}" required placeholder="Phone number">
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
                                    <input type="number" class="form-control @error('post_code') is-invalid @enderror" name="post_code" id="post_code" value="{{ $candidate_detail != null? $candidate_detail['post_code'] : '' }}" required placeholder="Post code">
                                    @error('post_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

                        </div>
                        <div class="mt-3 text-center">
                            <a href="/home" class="btn btn-light mr-3">Back to Home</a>
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
