@extends('layouts.main')

@section('page')
    Job Vacancy
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Job Vacancy</h1>
            <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#applied_job">Applied Job</button>
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

    {{-- Modal Job Detail --}}
    <div class="modal fade" id="applied_job" tabindex="-1" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Applied Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Applied</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Injilia Ratuntiga i</td>
                                <td>injil.r3@gmail.com </td>
                                <td>Female</td>
                                <td>17/07/00</td>
                                <td>Intership</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary">APPLY THIS JOB</button> --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Job Detail --}}

@endsection
