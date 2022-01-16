<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news', compact('news'));
    }

    public function create()
    {
        return view('admin.news');
    }

    public function store(Request $request)
    {
        // ddd($request->all());

        $validated = $request->validate([
            'post_date' => 'required|date',
            'title' => 'required|max:255',
            'body' => 'required',
            'picture' => 'required|image|file'
        ]);

        if ($request->file('picture')) {
            $validated['picture'] = $request->file('picture')->store('news-pic');
        }

        News::create($validated);

        return redirect(route('news'))->with('success', 'Success publish new news and event');
    }
}
