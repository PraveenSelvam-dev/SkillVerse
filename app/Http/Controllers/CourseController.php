<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Enrollment;
use App\Models\LessonCompletion;
use App\Models\Note;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['instructor', 'category'])->where('status', 'published');

        // Search / Query filter
        $search = $request->input('search', $request->input('q'));
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function($catQ) use ($search) {
                      $catQ->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Category filter (supports ID or Name)
        if ($request->filled('category')) {
            $categoryParam = $request->category;
            if (is_numeric($categoryParam)) {
                $query->where('category_id', $categoryParam);
            } else {
                $query->whereHas('category', function($q) use ($categoryParam) {
                    $q->where('name', 'like', '%' . $categoryParam . '%')
                      ->orWhere('slug', 'like', '%' . $categoryParam . '%');
                });
            }
        }

        // Level filter
        if ($request->filled('level') && $request->level !== 'all') {
            $query->where('level', $request->level);
        }

        // Price filter
        if ($request->filled('price')) {
            if ($request->price === 'free') {
                $query->where('price', 0);
            } elseif ($request->price === 'paid') {
                $query->where('price', '>', 0);
            }
        }

        // Sorting
        $sort = $request->input('sort', 'popular');
        if ($sort === 'new') {
            $query->latest();
        } elseif ($sort === 'price-asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price-desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'rating') {
            $query->orderBy('average_rating', 'desc');
        } else {
            $query->orderBy('total_students', 'desc')->latest();
        }

        $courses = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $categories = collect([
                (object)['id' => 1, 'name' => 'Programming'],
                (object)['id' => 2, 'name' => 'AI & Machine Learning'],
                (object)['id' => 3, 'name' => 'Cloud Computing'],
                (object)['id' => 4, 'name' => 'Cybersecurity'],
                (object)['id' => 5, 'name' => 'Web Development'],
                (object)['id' => 6, 'name' => 'Mobile Development'],
                (object)['id' => 7, 'name' => 'UI/UX Design'],
                (object)['id' => 8, 'name' => 'Business'],
                (object)['id' => 9, 'name' => 'Marketing'],
                (object)['id' => 10, 'name' => 'Data Science'],
            ]);
        }

        return view('courses.index', compact('courses', 'categories'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->with(['instructor', 'category', 'sections.lessons', 'reviews.user'])
            ->first();

        if (!$course) {
            $course = Course::with(['instructor', 'category', 'sections.lessons', 'reviews.user'])->first();
        }

        $sections = $course ? $course->sections : collect();
        $reviews = $course ? $course->reviews : collect();
        $relatedCourses = Course::where('id', '!=', $course ? $course->id : 0)
            ->take(4)
            ->get();

        return view('courses.show', compact('course', 'sections', 'reviews', 'relatedCourses'));
    }

    public function learn($slug)
    {
        $course = Course::where('slug', $slug)
            ->with(['sections.lessons'])
            ->first();

        if (!$course) {
            $course = Course::with(['sections.lessons'])->first();
        }

        $completedLessons = auth()->check() && $course 
            ? LessonCompletion::where('user_id', auth()->id())->pluck('lesson_id')->toArray() 
            : [];

        $lessonIds = $course ? $course->sections->flatMap->lessons->pluck('id') : collect();
        $notes = auth()->check() && $lessonIds->isNotEmpty()
            ? Note::where('user_id', auth()->id())->whereIn('lesson_id', $lessonIds)->get() 
            : collect();

        return view('courses.learn', compact('course', 'completedLessons', 'notes'));
    }

    public function enroll($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course && auth()->check()) {
            Enrollment::firstOrCreate([
                'user_id' => auth()->id(),
                'course_id' => $course->id,
            ], [
                'enrolled_at' => now(),
                'progress' => 0,
            ]);
        }
        return redirect()->route('courses.learn', $slug)->with('success', 'Enrolled successfully');
    }
}
