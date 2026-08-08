<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\MentorProfile;
use App\Models\Service;
use App\Models\Community;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::with(['instructor', 'category'])
            ->where('status', 'published')
            ->latest()
            ->take(8)
            ->get();

        $topMentors = MentorProfile::with('user')
            ->take(4)
            ->get();

        $popularServices = Service::with(['user', 'category'])
            ->latest()
            ->take(4)
            ->get();

        $communities = Community::with('owner')
            ->withCount('members')
            ->latest()
            ->take(4)
            ->get();

        $latestBlogs = BlogPost::with('author')
            ->latest()
            ->take(4)
            ->get();

        $categories = Category::withCount('courses')
            ->take(8)
            ->get();

        $skills = Skill::take(15)->get();

        $stats = (object)[
            'total_users' => User::count(),
            'total_courses' => Course::count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_instructors' => User::where('role', 'instructor')->count(),
            'total_communities' => Community::count(),
        ];

        return view('home', compact(
            'featuredCourses', 
            'topMentors', 
            'popularServices', 
            'communities', 
            'latestBlogs', 
            'categories',
            'skills',
            'stats'
        ));
    }
}
