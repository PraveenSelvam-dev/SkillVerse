<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class AdminCourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['instructor', 'category'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $courses = $query->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::with(['instructor', 'category', 'sections.lessons', 'reviews.user'])->findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }

    public function updateStatus(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->status = $request->input('status', 'published');
        $course->save();
        return redirect()->back()->with('success', 'Course status updated');
    }

    public function toggleFeatured($id)
    {
        $course = Course::findOrFail($id);
        $course->is_featured = !$course->is_featured;
        $course->save();
        return redirect()->back()->with('success', 'Course featured status toggled');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully');
    }
}
