<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $stats = (object)['enrolled' => 5, 'completed' => 2, 'certificates' => 2];
        $recentActivity = [];
        return view('dashboard.student.index', compact('stats', 'recentActivity')); // Assuming index view
    }
    
    public function myCourses()
    {
        $courses = [];
        return view('dashboard.student.courses', compact('courses'));
    }

    public function myLearning()
    {
        $courses = [];
        return view('dashboard.student.learning', compact('courses'));
    }

    public function wishlist()
    {
        $wishlist = [];
        return view('dashboard.student.wishlist', compact('wishlist'));
    }

    public function certificates()
    {
        $certificates = [];
        return view('dashboard.student.certificates', compact('certificates'));
    }

    public function downloads()
    {
        $downloads = [];
        return view('dashboard.student.downloads', compact('downloads'));
    }

    public function notes()
    {
        $notes = [];
        return view('dashboard.student.notes', compact('notes'));
    }

    public function orders()
    {
        $orders = [];
        return view('dashboard.student.orders', compact('orders'));
    }

    public function settings()
    {
        $user = (object)['name' => 'John Doe'];
        return view('dashboard.student.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
