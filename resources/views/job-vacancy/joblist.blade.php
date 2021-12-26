@extends('layouts.main')

@section('page')
    Job List
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Fresh Graduate</h1>
        </div>

        <div class="section-body">
            <h5>List of available jobs</h5>
            <div class="d-flex flex-column justify-content-center">

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Teller</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th><i>Location</i></th>
                                            <th><i>Major</i></th>
                                            <th><i>Employment type</i></th>
                                            <th><i>Position job</i></th>
                                            <th><i>Job function</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kantor Pusat</td>
                                            <td>All Major</td>
                                            <td>Contract</td>
                                            <td>Officer</td>
                                            <td>Teller</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <small>Active date: 05 Nov 2021 - 30 Dec 2021</small>
                            </div>
                            <div class="col-4 text-center">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#job_detail">View Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Teller</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th><i>Location</i></th>
                                            <th><i>Major</i></th>
                                            <th><i>Employment type</i></th>
                                            <th><i>Position job</i></th>
                                            <th><i>Job function</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kantor Pusat</td>
                                            <td>All Major</td>
                                            <td>Contract</td>
                                            <td>Officer</td>
                                            <td>Teller</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <small>Active date: 05 Nov 2021 - 30 Dec 2021</small>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#" class="btn btn-outline-primary">View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
