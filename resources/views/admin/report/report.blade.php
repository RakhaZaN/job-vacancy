@extends('layouts.main')

@section('page')
    Report
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Report</h1>
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
            {{-- <a href="{{ url()->previous() }}" class="btn btn-light mb-3">Back</a> --}}

            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row justify-content-between mb-3">
                            <div class="col-6 col-md-3">
                                <select class="form-control selectric" name="year" id="year">
                                    @forelse ($years as $y)
                                    @if ($y->year != null)
                                    <option value="{{ $y->year }}" {{ $selected_year == $y->year ? 'selected' : '' }}>{{ $y->year }}</option>
                                    @endif
                                    @empty
                                    <option>Not data Available yet</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <a href="{{ route('admin.report.add') }}" class="btn btn-outline-success">Add New</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Division / Departement</th>
                                        <th>Applies</th>
                                        <th>Accepted</th>
                                        <th>Rejected</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($month); $i++)
                                    <tr>
                                        <td>{{ $month[$i] }}</td>
                                        @foreach ($data as $report)
                                        @if ($report->month == $i + 1)
                                        <td>{{ $report->jobVacancy->title }}</td>
                                        <td>{{ $report->count_applicants }}</td>
                                        <td>{{ $report->accepted }}</td>
                                        <td>{{ $report->rejected }}</td>
                                        <td>{{ $report->description }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-success"><i class="fas fa-arrow-circle-down"></i></a>
                                        </td>
                                        @endif
                                        @endforeach
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="#" class="btn btn-outline-primary btn-lg"><i class="fas fa-arrow-circle-down"></i> All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
