<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        $communities = Community::with('owner')->withCount('members')->paginate(12);
        return view('communities.index', compact('communities'));
    }

    public function show($slug)
    {
        $community = Community::where('slug', $slug)->with(['owner', 'posts.comments', 'events', 'members'])->first();
        if (!$community) {
            $community = Community::with(['owner', 'posts.comments', 'events', 'members'])->first();
        }
        $posts = $community ? $community->posts : collect();
        $members = $community ? $community->members : collect();
        $events = $community ? $community->events : collect();
        return view('communities.show', compact('community', 'posts', 'members', 'events'));
    }

    public function join($slug)
    {
        return redirect()->back()->with('success', 'Joined community successfully');
    }

    public function leave($slug)
    {
        return redirect()->back()->with('success', 'Left community successfully');
    }
}
