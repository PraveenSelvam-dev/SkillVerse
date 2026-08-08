<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('courses')->get();
        
        if ($categories->isEmpty()) {
            $categories = collect([
                (object)['id' => 1, 'name' => 'Programming & Web Development', 'slug' => 'programming', 'icon' => 'fa-code', 'courses_count' => 1200, 'description' => 'Master Python, JavaScript, Laravel, React, and modern full-stack development.'],
                (object)['id' => 2, 'name' => 'AI & Data Science', 'slug' => 'ai-data-science', 'icon' => 'fa-brain', 'courses_count' => 850, 'description' => 'Explore Machine Learning, Deep Learning, Neural Networks, and Data Engineering.'],
                (object)['id' => 3, 'name' => 'Cloud Computing & DevOps', 'slug' => 'cloud-devops', 'icon' => 'fa-cloud', 'courses_count' => 600, 'description' => 'AWS, Azure, Docker, Kubernetes, Terraform, and CI/CD pipelines.'],
                (object)['id' => 4, 'name' => 'Cybersecurity & Ethical Hacking', 'slug' => 'cybersecurity', 'icon' => 'fa-shield-halved', 'courses_count' => 450, 'description' => 'Network security, penetration testing, cryptography, and risk assessment.'],
                (object)['id' => 5, 'name' => 'Mobile App Development', 'slug' => 'mobile-dev', 'icon' => 'fa-mobile-screen', 'courses_count' => 900, 'description' => 'Build cross-platform iOS and Android apps with Flutter, React Native, and Swift.'],
                (object)['id' => 6, 'name' => 'UI/UX Design & Product Design', 'slug' => 'ui-ux-design', 'icon' => 'fa-pen-nib', 'courses_count' => 750, 'description' => 'Figma, wireframing, design systems, and user experience research.'],
                (object)['id' => 7, 'name' => 'Business & Entrepreneurship', 'slug' => 'business', 'icon' => 'fa-chart-line', 'courses_count' => 1500, 'description' => 'Startups, digital marketing, sales strategies, and project management.'],
                (object)['id' => 8, 'name' => 'Finance & Cryptocurrency', 'slug' => 'finance', 'icon' => 'fa-dollar-sign', 'courses_count' => 520, 'description' => 'Personal finance, stock trading, blockchain, and decentralized finance.'],
            ]);
        }

        return view('categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return redirect()->route('courses.index', ['category' => $category ? $category->id : null]);
    }
}
