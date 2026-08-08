<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = (object)[
            'users_by_role' => ['student' => 1000, 'instructor' => 50, 'mentor' => 20, 'freelancer' => 30],
            'total_revenue' => 150000,
            'recent_signups' => 25,
            'course_count' => 120,
            'order_count' => 450
        ];
        return view('admin.index', compact('stats'));
    }
}
