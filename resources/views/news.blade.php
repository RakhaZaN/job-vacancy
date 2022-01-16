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

                @forelse ($news as $n)
                <div class="card border border-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="carc-title">{{ $n['title'] }}</h4>
                        <span>{{ $n['post_date'] }}</span>
                    </div>
                    <div class="card-body row align-items-center">
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('storage/'. $n['picture']) }}" class="news-img w-100" alt="thumbnail">
                        </div>
                        <article class="col">
                            {!! $n['body'] !!}
                        </article>
                    </div>
                </div>
                @empty
                <h4>Not any news & event created</h4>
                @endforelse

            </div>
        </div>
    </section>

@endsection
