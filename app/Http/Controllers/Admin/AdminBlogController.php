<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        $posts = collect(array_fill(0, 10, (object)['id' => 1, 'title' => 'Blog Post']));
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully');
    }

    public function edit($id)
    {
        $post = (object)['id' => $id, 'title' => 'Blog Post'];
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully');
    }
}
