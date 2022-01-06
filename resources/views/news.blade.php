@extends('layouts.main')

@section('page')
    News & Event
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header d-flex justify-content-between">
                <h1>News & Event</h1>
                @if (auth()->user()->role == 'admin')
                <a href="{{ route('admin.news') }}" class="btn btn-outline-success">Add News</a>
                @endif
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
            <div class="d-flex flex-column">

                <div class="news shadow-sm">
                    <div class="news-title mb-3">
                        <h3>Looking Stunning, Bank SulutGo Choir Wins Second Place</h3>
                        <small>Thursday, 25th November 2021</small>
                    </div>
                    <div class="news-content row">
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('./assets/img/example-image.jpg') }}" class="news-img w-100" alt="...">
                        </div>
                        <div class="col align-self-center">
                            <p>Representatives of the Bank SulutGo Choir won 2nd place again when appearing in the Financial Services Sector Choir Competition, virtually</p>
                        </div>
                    </div>
                </div>
                <div class="news shadow-sm">
                    <div class="news-title mb-3">
                        <h3>Looking Stunning, Bank SulutGo Choir Wins Second Place</h3>
                        <small>Thursday, 25th November 2021
                        </small>
                    </div>
                    <div class="news-content row">
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('./assets/img/example-image.jpg') }}" class="news-img w-100" alt="...">
                        </div>
                        <div class="col align-self-center">
                            <p>Representatives of the Bank SulutGo Choir won 2nd place again when appearing in the Financial Services Sector Choir Competition, virtually</p>
                        </div>
                    </div>
                </div>
                <div class="news shadow-sm">
                    <div class="news-title mb-3">
                        <h3>Looking Stunning, Bank SulutGo Choir Wins Second Place</h3>
                        <small>Thursday, 25th November 2021
                        </small>
                    </div>
                    <div class="news-content row">
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('./assets/img/example-image.jpg') }}" class="news-img w-100" alt="...">
                        </div>
                        <div class="col align-self-center">
                            <p>Representatives of the Bank SulutGo Choir won 2nd place again when appearing in the Financial Services Sector Choir Competition, virtually</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
