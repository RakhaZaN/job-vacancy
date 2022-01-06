<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('admin.announcement');
    }

    public function save(Request $request)
    {
        // dd($request->all());
        return view(route('job-vacancy.index'))->with('success', 'Success make an announcement');
    }
}
