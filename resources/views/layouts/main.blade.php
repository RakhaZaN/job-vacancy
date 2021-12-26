<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('page') &mdash; BSG</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('partials.navbar')

            @include('partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('main-content')
            </div>
            {{-- <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Design By Dupat Indonesia
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer> --}}
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal Job Detail --}}
    <div class="modal fade" id="job_detail" tabindex="-1" aria-labelledby="modalJobDetail" aria-hidden="true">
        <div class="modal-dialog modal-lg m-0" role="document">
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
                    <div class="footer">
                        <a href="#" class="btn btn-primary">APPLY THIS JOB</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Job Detail --}}

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>
