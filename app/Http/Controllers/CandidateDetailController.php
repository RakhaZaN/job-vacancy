<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateDetailController extends Controller
{
    public function index(Request $request)
    {
        $prev = url()->previous();
        $detail = User::with('candidateDetail')
        ->where('id', auth()->user()->id)->first();
        if ($request->has('id')) {
            $detail = User::with('candidateDetail')->find($request->id);
        }
        if ($detail['candidateDetail'] != null) {
            $detail['candidateDetail']['skills'] = json_decode($detail['candidateDetail']['skills'], false);
        }

        $major = $this->major();
        // return $detail;
        return view('editprofile')
            ->with('prev', $prev)
            ->with('major', $major)
            ->with('candidate', $detail);
    }

    public function saveChange(Request $request)
    {
        $userId = $request['user_id'];
        $userValidated = $request->validate([
            'fullname' => 'required|max:50',
            'email' => 'required|email:dns|max:100',
        ]);
        User::where('id', $userId)->update($userValidated);

        $candidateValidated = $request->validate([
            'dob' => 'sometimes|nullable|date',
            'gender' => 'sometimes|nullable|in:F,M',
            'address' => 'sometimes|nullable|max:255',
            'phone' => 'sometimes|nullable|max:20',
            'country' => 'sometimes|nullable|max:100',
            'provincy' => 'sometimes|nullable|max:100',
            'city' => 'sometimes|nullable|max:100',
            'post_code' => 'sometimes|nullable|max:10',
            'edu_level' => 'sometimes|nullable|max:50',
            'edu_degree' => 'sometimes|nullable',
            'edu_school' => 'sometimes|nullable|max:100',
            'edu_major' => 'sometimes|nullable|max:100',
            'edu_start' => 'sometimes|nullable|date',
            'edu_end' => 'sometimes|nullable|date',
            'we_title' => 'sometimes|nullable|max:50',
            'we_company' => 'sometimes|nullable|max:100',
            'we_from' => 'sometimes|nullable|date',
            'we_to' => 'sometimes|nullable|date',
            'we_description' => 'sometimes|nullable|max:255',
            'we_job_level' => 'sometimes|nullable|in:director,senior,supervisor,officer,entry',
        ]);

        if ($request['skill_name'] != null) {
            for ($i=0; $i < count($request['skill_name']); $i++) {
                $candidateValidated['skills'][$i][0] = $request['skill_name'][$i];
                $candidateValidated['skills'][$i][1] = $request['skill_level'][$i];
            }
            $candidateValidated['skills'] = json_encode($candidateValidated['skills']);
        }
        // return $candidateValidated;

        CandidateDetail::updateOrCreate(['user_id' => $userId], $candidateValidated);

        return back()->with(['success' => 'Successfuly saved changes !', 'prev' => $request->previous_url]);
    }

    public function major()
    {
        return [
            "MBA / Master of Business Administration", 
            "Finance", 
            "Bussiness", 
            "FinTech", 
            "Economics", 
            "Accounting", 
            "Finnancial Engineering", 
            "Physics / Engineering / Mathemathics", 
            "Banking", 
            "Computer Science / Information Technology", 
            "International Bussiness", 
            "Corporate / Bussiness Law"
        ];
    }
}
