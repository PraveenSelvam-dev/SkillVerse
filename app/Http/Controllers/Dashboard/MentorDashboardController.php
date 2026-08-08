<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorDashboardController extends Controller
{
    public function index()
    {
        $stats = (object)['appointments' => 10, 'sessions' => 50, 'revenue' => 2000, 'rating' => 4.9];
        return view('mentor.index', compact('stats'));
    }

    public function appointments()
    {
        $appointments = [];
        return view('mentor.appointments', compact('appointments'));
    }

    public function availability()
    {
        $availability = [];
        return view('mentor.availability', compact('availability'));
    }

    public function updateAvailability(Request $request)
    {
        return redirect()->back()->with('success', 'Availability updated successfully');
    }

    public function packages()
    {
        $packages = [];
        return view('mentor.packages', compact('packages'));
    }

    public function createPackage(Request $request)
    {
        return redirect()->back()->with('success', 'Package created successfully');
    }

    public function updatePackage(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Package updated successfully');
    }

    public function deletePackage($id)
    {
        return redirect()->back()->with('success', 'Package deleted successfully');
    }

    public function reviews()
    {
        $reviews = [];
        return view('mentor.reviews', compact('reviews'));
    }

    public function revenue()
    {
        $revenue = [];
        return view('mentor.revenue', compact('revenue'));
    }

    public function settings()
    {
        return view('mentor.settings');
    }

    public function updateSettings(Request $request)
    {
        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
