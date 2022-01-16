@extends('layouts.main')

@section('page')
    Announcement
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Announcement</h1>
            {{-- @if (auth()->user()->role == 'admin')
            <a href="{{ route('admin.announce') }}" class="btn btn-success">New Announcement</a>
            @endif --}}
        </div>

        <div class="section-body">
            <div class="d-flex flex-column">

                @forelse ($announcements as $announce)
                <div class="card border @if ($announce->purposeJob->status == 'confirmed') border-success @else border-danger @endif">
                    <div class="card-header d-flex align-items-center">
                        <span class="mr-3">{{ $announce['date'] }}</span>
                        <h4 class="carc-title">{{ $announce['title'] }}</h4>
                    </div>
                    <div class="card-body">
                        <article>
                            {!! $announce['announcement'] !!}
                        </article>
                    </div>
                </div>
                @empty
                <h4>Not any announcement created</h4>
                @endforelse

            </div>
        </div>
    </section>

@endsection
