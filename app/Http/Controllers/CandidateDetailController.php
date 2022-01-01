<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateDetailController extends Controller
{
    public function index()
    {
        $detail = CandidateDetail::where('user_id', auth()->user()->id)->first();
        // dd($detail);
        return view('editprofile')
            ->with('candidate_detail', $detail);
    }

    public function saveChange(Request $request)
    {
        $userId = $request['user_id'];
        $userValidated = $request->validate([
            'fullname' => 'required|max:50',
            'email' => 'required|email:dns|max:100',
        ]);
        $candidateValidated = $request->validate([
            'dob' => 'required|date',
            'gender' => 'required|in:F,M',
            'address' => 'required|max:255',
            'phone' => 'required|max:20',
            'country' => 'required|max:100',
            'provincy' => 'required|max:100',
            'city' => 'required|max:100',
            'post_code' => 'required|max:10',
        ]);

        User::where('id', $userId)->update($userValidated);
        CandidateDetail::updateOrCreate(['user_id' => $userId], $candidateValidated);

        return back()->with('success', 'Successfuly saved changes !');
    }
}
