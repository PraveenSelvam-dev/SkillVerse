<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCmsController extends Controller
{
    public function index()
    {
        $pages = collect(array_fill(0, 5, (object)['id' => 1, 'title' => 'CMS Page']));
        return view('admin.cms.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.cms.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.cms.index')->with('success', 'Page created successfully');
    }

    public function edit($id)
    {
        $page = (object)['id' => $id, 'title' => 'CMS Page'];
        return view('admin.cms.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.cms.index')->with('success', 'Page updated successfully');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.cms.index')->with('success', 'Page deleted successfully');
    }
}
