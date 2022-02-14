@extends('layouts.main')

@section('page')
    Edit Report
@endsection

@section('main-content')

    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Edit Report</h1>
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
                                        <select name="year" id="year" class="form-control selectric" readonly>
                                            {{-- <option value="2021">2021</option> --}}
                                            <option value="{{ $data->year }}">{{ $data->year }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-md-3">
                                        <label for="month">Month</label>
                                    </div>
                                    <div class="col">
                                        <select name="month" id="month" class="form-control selectric" readonly>
                                            <option value="{{ $data->month }}">{{ $data->month_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-md-3">
                                        <label for="division">Division / Departement</label>
                                    </div>
                                    <div class="col">
                                        <select name="job_vacancy_id" id="division" class="form-control selectric" readonly>
                                            <option value="{{ $data->job_vacancy_id }}">{{ $data->jobVacancy->title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="description" class="form-control" value="{{ $data->description }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('admin.report.delete', ['id' => $data->id, 'prev' => url()->previous()]) }}" class="btn btn-danger btn-lg mr-3">Delete</a>
                                {{-- <form action="{{ route('admin.report.delete') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg mr-3">Delete</button>
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <input type="hidden" name="prev" value="{{ url()->previous() }}">
                                </form> --}}
                                <button type="submit" class="btn btn-primary btn-lg">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

{{-- @section('script-page')
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

@endsection --}}
