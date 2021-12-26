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
            <div class="card card-primary">
                <form action="/edit-profile" method="POST" class="row g-2 needs-validation" novalidate>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="fullname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="fullname" value="Ujang Maman" required
                                        placeholder="Full name">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="ujang.maman@gmail.com"
                                        required placeholder="Email">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="" class="form-label d-block">Gender</label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="gender" value="Male" class="selectgroup-input" checked>
                                    <span class="selectgroup-button">Male</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="gender" value="Female" class="selectgroup-input">
                                    <span class="selectgroup-button">Female</span>
                                </label>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-group">
                                    <label for="birth_place" class="form-label">Birth</label>
                                    <input type="text" class="form-control" id="birth_place" value="" required
                                        placeholder="Birth place">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label"></label>
                                    <input type="date" class="form-control" id="birth_date" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" value="" required
                                        placeholder="Address">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" value="" required
                                        placeholder="Country">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-group">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province" value="" required
                                        placeholder="Province">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-group">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" value="" required
                                        placeholder="City">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="phone" value="" required
                                        placeholder="Phone number">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="post_code" class="form-label"></label>
                                    <input type="number" class="form-control" id="post_code" value="" required
                                        placeholder="Post code">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3 text-center">
                            <a href="/home" class="btn btn-light mr-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
