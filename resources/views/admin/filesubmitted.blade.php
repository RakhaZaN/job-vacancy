@extends('layouts.main')

@section('page')
    File Submitted
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>File Sumbitted</h1>
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
            <a href="{{ url()->previous() }}" class="btn btn-light mb-3">Back</a>
            <div class="row">

                @forelse ($files as $file)
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <iframe class="w-100" src="{{ asset('storage/'.$file->filename) }}" frameborder="0"></iframe>
                            <a href="{{ asset('storage/'.$file->filename) }}" class="btn btn-sm btn-info mr-3" target="_blank"><i class="fas fa-eye"></i></a>
                            <small>{{ $file->user->fullname }} - {{ $file->upload_at }}</small>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <h4>No file submitted yet</h4>
                </div>
                @endforelse

            </div>
        </div>
    </section>

@endsection
