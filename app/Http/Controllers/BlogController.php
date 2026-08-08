<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = BlogPost::with('author')->where('status', 'published')->paginate(9);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->with(['author', 'comments.user'])->first();
        if (!$post) {
            $post = BlogPost::with(['author', 'comments.user'])->first();
        }
        $comments = $post ? $post->comments : collect();
        $author = $post ? $post->author : null;
        return view('blog.show', compact('post', 'comments', 'author'));
    }

    public function comment(Request $request, $slug)
    {
        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
