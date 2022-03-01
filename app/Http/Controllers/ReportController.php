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
        $month = $this->getMonth();
        $data = $this->getData($selected_year);
        // dd($data, $selected_year);

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

    public function update(Request $request)
    {
        $data = Report::with([
            'jobVacancy:id,title',
        ])->find($request['id']);
        $data['month_name'] = $this->getMonth(number_format($data['month'] - 1));
        // return $data;
        return view('admin.report.edit', compact('data'));
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

    public function destroy(Request $request)
    {
        Report::find($request->id)->delete();

        return redirect($request->prev)->with('success', 'Successfully delete report');
    }

    public function generatePDF(Request $request)
    {
        $year = $request['year'];
        $month = $request->has('month') ? $request['month'] : null;
        $data = $this->getData($year, $month);
        // return $data;
        if (!$request->has('month')) {
            $month = $this->getMonth();
            $pdf = PDF::loadView('admin.report.yearly_report_view', compact('data', 'year', 'month'));
            return $pdf->download('report_'.$year.'.pdf');
            // return view('admin.report.yearly_report_view', compact('data', 'year', 'month'));
        }
        $month = $this->getMonth(number_format($month) - 1);
        $pdf = PDF::loadView('admin.report.monthly_report_view', compact('data', 'year', 'month'));
        return $pdf->download('report_'.$year.'_'.$month.'.pdf');
        // return view('admin.report.monthly_report_view', compact('data', 'year', 'month'));
    }

    private function getData($year, $month=null)
    {
        $data = Report::with([
            'jobVacancy:id,title',
            'applicants:id,job_vacancy_id,status'
        ])
        ->where('year', $year);

        if ($month != null) {
            $data = $data->where('month', $month);
        }

        $data = $data->get();

        foreach ($data as $val) {
            $acc = 0;
            $rej = 0;
            $pend = 0;
            foreach ($val->applicants as $value) {
                $acc += $value->status == 'confirmed' ? 1 : 0;
                $rej += $value->status == 'rejected' ? 1 : 0;
                $pend += $value->status == 'send' ? 1 : 0;
            };
            $val['count_applicants'] = count($val['applicants']);
            $val['accepted'] = $acc;
            $val['rejected'] = $rej;
            $val['pending'] = $pend;
        }

        return $data;
    }

    private function getYear()
    {
        return JobVacancy::select(DB::raw('DISTINCT YEAR(active_date) as year'))
        ->orderByDesc('year')->get();
    }

    private function getMonth($m = '')
    {
        $month = ['January', 'February', 'March', 'April', 'June', 'July', 'August', 'September', 'October', 'November', ' December'];
        return $m == '' ? $month : $month[$m];
    }

    private function getDivision()
    {
        return JobVacancy::selectRaw('id, title, YEAR(active_date) as year, MONTH(active_date) as month')
        ->orderByDesc('year')
        ->get();
    }
}
