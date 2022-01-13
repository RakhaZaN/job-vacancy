<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; BSG</title>

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

<body>

    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-center">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 order-2 bg-white">
                    <div class="p-4 m-3">
                        <h4 class="text-dark font-weight-bold">Register</h4>
                        <p class="text-muted">Please fill in the data below</p>
                        <form method="POST" action="{{ route('auth.register') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}">
                                @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}job
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="copass" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <input type="hidden" name="role" value="candidate">

                            <div class="form-group text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Back</a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                                    Register
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12 order-lg-2 align-items-center order-1">
                    <div class="text-center index-2">
                        <div class="text-dark p-5 pb-2">
                            <div class="mb-5 pb-3">
                                {{-- <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1> --}}
                                <img src="" alt="">
                                <h5 class="font-weight-normal">Bali, Indonesia</h5>
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
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });
    </script>
</body>

</html>
