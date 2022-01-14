<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; BSG</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body class="bg-white">

    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-center">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 order-2">
                    <div class="p-4 m-3">
                        <div class="mb-5">
                            <button type="button" class="btn btn-sm btn-light" data-container="body" data-toggle="popover" data-html="true" data-placement="right" data-content="<a href='{{ route('admin.login') }}'>Admin</a>">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                        <h4 class="text-dark font-weight-bold">E-RECRUITMENT BSG</h4>
                        <p class="text-muted">Please enter your email and password to login</p>
                       {{-- Alerts --}}
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>x</span></button>
                          </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>x</span></button>
                          </div>
                        @endif
                        {{-- End Alerts --}}
                        <form method="POST" action="{{ route('auth.login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                    required>
                            </div>
                            <input type="hidden" name="role" value="candidate">

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                                Don't have account? <a href="{{ route('register') }}">Register here</a>
                            </div>
                        </form>

                        {{-- <div class="text-center mt-5 text-small">
                  Copyright &copy; Your Company. Made with 💙 by Stisla
                  <div class="mt-2">
                    <a href="#">Privacy Policy</a>
                    <div class="bullet"></div>
                    <a href="#">Terms of Service</a>
                  </div>
                </div> --}}
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12 order-lg-2 align-items-center order-1">
                    <div class="text-center index-2">
                        <div class="text-dark p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <img src="{{ asset('assets/img/logo bsg.jpg') }}" alt="logo">
                                <h1 class="mb-2 display-5 font-weight-bold">E-RECRUITMENT BSG</h1>
                                <p class="font-weight-normal">Telp. (0431) 861759, Fax (041) 854522 <br> Jl. Sam Ratulangi No. 9 Manado 95111 <br> Bank SulutGo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        // var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        // var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        //     return new bootstrap.Popover(popoverTriggerEl)
        // });
    </script>
</body>

</html>
