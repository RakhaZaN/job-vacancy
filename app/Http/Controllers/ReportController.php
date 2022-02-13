<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $years = $this->getYear();
        $selected_year = $request->has('year') ? $request->year : $years[0]['year'];
        $month = ['January', 'February', 'March', 'April', 'June', 'July', 'August', 'September', 'October', 'November', ' December'];
        $data = Report::with([
            'jobVacancy:id,title',
            'applicants' => function ($q) {
                $q->selectRaw('id, job_vacancy_id, status');
            }
        ])
        ->where('year', $selected_year)
        ->get();
        // dd($data, $selected_year);
        foreach ($data as $val) {
            $acc = 0;
            foreach ($val->applicants as $value) {
                $acc += $value->status == 'confirmed' ? 1 : 0;
            };
            $val['count_applicants'] = count($val['applicants']);
            $val['accepted'] = $acc;
            $val['rejected'] = $val['count_applicants'] - $val['accepted'];
        }
        // $data = $data->groupBy('month');
        // return $data['1'];


        return view('admin.report.report', compact('years', 'data', 'selected_year', 'month'));
    }

    public function create()
    {
        $years = $this->getYear();

        $divisions = $this->getDivision();
        // return $years;

        return view('admin.report.add', compact('years', 'divisions'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validate = $request->validate([
            'year' => 'required|max:5',
            'month' => 'required|max:2',
            'description' => 'nullable|max:255',
        ]);

        Report::updateOrCreate(['job_vacancy_id' => $request['job_vacancy_id']], $validate);

        return redirect()->route('admin.report.index')->with('success', 'Success add new report');
    }

    public function generatePDF(Request $request)
    {
        $pdf = PDF::loadView('admin.report.monthly_report_view');
        return $pdf->download('report_monthly.pdf');
        return view('admin.report.monthly_report_view');
    }

    private function getYear()
    {
        return JobVacancy::select(DB::raw('DISTINCT YEAR(active_date) as year'))
        ->orderByDesc('year')->get();
    }

    private function getDivision()
    {
        return JobVacancy::selectRaw('id, title, YEAR(active_date) as year, MONTH(active_date) as month')
        ->orderByDesc('year')
        ->get();
    }
}
