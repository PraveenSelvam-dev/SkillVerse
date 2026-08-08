<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = (object)['title' => 'Sample Page', 'slug' => $slug, 'content' => 'Content here'];
        return view('pages.show', compact('page'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        return redirect()->back()->with('success', 'Support ticket created successfully');
    }
}
