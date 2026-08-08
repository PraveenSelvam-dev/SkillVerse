<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\User;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        $query = MentorProfile::with(['user', 'packages']);

        // Search term (by name, title, about, expertise)
        $search = $request->input('search', $request->input('q'));
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('about', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function($userQ) use ($search) {
                      $userQ->where('name', 'like', '%' . $search . '%')
                            ->orWhere('bio', 'like', '%' . $search . '%');
                  });
            });
        }

        // Expertise filter
        if ($request->filled('expertise')) {
            $expertiseParam = (array) $request->expertise;
            $query->where(function($q) use ($expertiseParam) {
                foreach ($expertiseParam as $exp) {
                    $q->orWhere('title', 'like', '%' . $exp . '%')
                      ->orWhere('about', 'like', '%' . $exp . '%')
                      ->orWhereHas('user', function($userQ) use ($exp) {
                          $userQ->where('bio', 'like', '%' . $exp . '%');
                      });
                }
            });
        }

        // Max hourly rate filter
        if ($request->filled('max_rate') && is_numeric($request->max_rate) && $request->max_rate < 300) {
            $query->where('hourly_rate', '<=', $request->max_rate);
        }

        $mentors = $query->paginate(12)->withQueryString();

        return view('mentors.index', compact('mentors'));
    }

    public function show($id)
    {
        $mentor = MentorProfile::where('id', $id)->with(['user', 'packages'])->first();
        if (!$mentor) {
            $mentor = MentorProfile::with(['user', 'packages'])->first();
        }
        $packages = $mentor ? $mentor->packages : collect();
        $reviews = collect();
        return view('mentors.show', compact('mentor', 'packages', 'reviews'));
    }

    public function book(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Booked mentorship session successfully!');
    }
}
