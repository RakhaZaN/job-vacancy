@extends('layouts.main')

@section('page')
    New Report
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Add New Report</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.report.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6 col-md-3">
                                        <label for="year">Year</label>
                                    </div>
                                    <div class="col">
                                        <select name="year" id="year" class="form-control selectric">
                                            {{-- <option value="2021">2021</option> --}}
                                            @forelse ($years as $year)
                                            @if ($year->year != null)
                                            <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endif
                                            @empty
                                            <option value="">Not data available yet</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-md-3">
                                        <label for="month">Month</label>
                                    </div>
                                    <div class="col">
                                        <select name="month" id="month" class="form-control selectric">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-md-3">
                                        <label for="division">Division / Departement</label>
                                    </div>
                                    <div class="col">
                                        <select name="job_vacancy_id" id="division" class="form-control selectric">
                                            <option disabled selected>Select division / departement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                {{-- <a href="{{ url('/home') }}" class="btn btn-light btn-lg mr-3">Cancel</a> --}}
                                <button type="submit" class="btn btn-primary btn-lg">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script-page')
<div class="clone d-none">
    @forelse ($years as $year)
    <div class="{{ $year->year }}">
        @for ($i = 1; $i <= 12; $i++)
        <div class="{{ $i }}">
            @foreach ($divisions as $division)
            @if ($division->year == $year->year && $division->month == $i)
            <option value="{{ $division->id }}">{{ $division->title }}</option>
            @endif
            @endforeach
        </div>
        @endfor
    </div>
    @empty
    @endforelse
</div>

<script>
    function changeList() {
        const year = $('#year').val()
        const month = $('#month').val()
        const getList = $('.clone .' + year + ' .' + month).html()
        // console.log(getList);

        $('#division').html(getList)
    }

    $(document).ready(function () {
        changeList()

        $('#year').change(function () {
            changeList()
        })
        $('#month').change(function () {
            changeList()
        })
    })
</script>

@endsection
