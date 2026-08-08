<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\MentorProfile;
use App\Models\Service;
use App\Models\Community;
use App\Models\BlogPost;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q', '');

        $results = [
            'courses' => $q ? Course::where('title', 'like', "%{$q}%")->take(6)->get() : Course::latest()->take(6)->get(),
            'mentors' => $q ? MentorProfile::with('user')->whereHas('user', function($query) use ($q) { $query->where('name', 'like', "%{$q}%"); })->take(6)->get() : MentorProfile::with('user')->take(6)->get(),
            'services' => $q ? Service::where('title', 'like', "%{$q}%")->take(6)->get() : Service::latest()->take(6)->get(),
            'communities' => $q ? Community::where('name', 'like', "%{$q}%")->take(6)->get() : Community::latest()->take(6)->get(),
            'blogs' => $q ? BlogPost::where('title', 'like', "%{$q}%")->take(6)->get() : BlogPost::latest()->take(6)->get(),
        ];

        return view('search.results', compact('results', 'q'));
    }
}
