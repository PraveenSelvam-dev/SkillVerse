<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobListing::where('is_active', true)->latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = JobListing::where('slug', $slug)->first();
        if (!$job) {
            $job = JobListing::where('is_active', true)->first();
        }
        return view('jobs.show', compact('job'));
    }

    public function apply(Request $request, $slug)
    {
        return redirect()->back()->with('success', 'Applied to job successfully');
    }
}
