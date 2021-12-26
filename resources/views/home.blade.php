@extends('layouts.main')

@section('page')
    Homepage
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header">
            <h1>Homepage</h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('./assets/img/news/img01.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('./assets/img/news/img02.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('./assets/img/news/img03.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
