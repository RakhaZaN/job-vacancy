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
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#job_detail">View Detail</button>
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
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#job_detail">View Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Modal Job Detail --}}
    <div class="modal fade" id="job_detail" tabindex="-1" role="dialog" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Job Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <small class="text-right">Active date: 05 Okt 2021 - 30 Nov 2021</small>
                    <h4>Teller</h4>
                    <hr>
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th><i>Location</i></th>
                                <th><i>Major</i></th>
                                <th><i>Position job</i></th>
                                <th><i>Job function</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kantor Pusat</td>
                                <td>All Major</td>
                                <td>Officer</td>
                                <td>Teller</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th><i>Education level</i></th>
                                <th><i>Employment type</i></th>
                                <th><i>Age</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bachelor Degree</td>
                                <td>Contract</td>
                                <td>22 - 25 years old</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5 class="title">Requirements</h5>
                    <ul>
                        <li>High school diploma or equivalent</li>
                        <li>Bachelor’s degree in a relevant field may be preferred</li>
                        <li>Cash handling experience and on-the-job training</li>
                        <li>Exceptional time management, communication, and customer
                            service skills</li>
                        <li>Basic math and computer skills</li>
                        <li>High level of accountability, efficiency, and accuracy</li>
                        <li>Professional appearance and courteous manner.
                        </li>
                    </ul>
                    <hr>
                    <h5 class="title">Responsibilities</h5>
                    <ul>
                        <li>High school diploma or equivalent</li>
                        <li>Bachelor’s degree in a relevant field may be preferred</li>
                        <li>Cash handling experience and on-the-job training</li>
                        <li>Exceptional time management, communication, and customer
                            service skills</li>
                        <li>Basic math and computer skills</li>
                        <li>High level of accountability, efficiency, and accuracy</li>
                        <li>Professional appearance and courteous manner.
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">APPLY THIS JOB</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Job Detail --}}

@endsection
