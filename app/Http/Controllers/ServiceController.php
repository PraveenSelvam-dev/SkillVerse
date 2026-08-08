<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::with(['user', 'category'])->paginate(12);
        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->with(['user', 'category', 'packages', 'reviews.user'])->first();
        if (!$service) {
            $service = Service::with(['user', 'category', 'packages', 'reviews.user'])->first();
        }
        $packages = $service ? $service->packages : collect();
        $reviews = $service ? $service->reviews : collect();
        $freelancer = $service ? $service->user : null;
        return view('services.show', compact('service', 'packages', 'reviews', 'freelancer'));
    }

    public function order(Request $request, $slug)
    {
        return redirect()->back()->with('success', 'Order created successfully');
    }
}
