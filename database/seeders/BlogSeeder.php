<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first() ?? User::factory()->create();
        $category = Category::first();

        $posts = [
            [
                'title' => 'Introducing SkillVerse 2.0: A New Era of Online Learning & Freelance',
                'excerpt' => 'Discover the completely redesigned platform featuring AI-powered mentorship matching, interactive coding environments, and integrated freelance tools.',
                'content' => 'SkillVerse 2.0 brings together learners, instructors, mentors, and freelancers into a unified ecosystem. Empowering everyone to learn skills, offer services, and build communities.',
                'status' => 'published',
            ],
            [
                'title' => 'Top 10 Full-Stack Web Development Trends to Watch in 2024',
                'excerpt' => 'From Server-Side Rendering (SSR) and AI-driven code tools to micro-frontends, explore the technologies shaping modern web engineering.',
                'content' => 'Modern web application development demands high performance, SEO optimization, and seamless user experience. Learn why Laravel, React, and Vue are leading the industry.',
                'status' => 'published',
            ],
            [
                'title' => 'How to Land Your First High-Paying Freelance Client on SkillVerse',
                'excerpt' => 'Proven strategies for building a compelling portfolio, writing winning service packages, and delivering exceptional client value.',
                'content' => 'Freelancing is all about building trust and showcasing tangible results. Learn how top freelancers optimize their pricing, packages, and delivery milestones.',
                'status' => 'published',
            ],
            [
                'title' => 'The Complete Guide to Mentorship: How 1-on-1 Guidance Accelerates Careers',
                'excerpt' => 'Why self-study alone is not enough and how real-time guidance from industry mentors can fast-track your promotion.',
                'content' => 'Mentorship provides personalized advice, code reviews, and career coaching tailored to your specific goals. Here is how to make the most of your 1-on-1 sessions.',
                'status' => 'published',
            ],
            [
                'title' => 'Mastering Laravel 12 Architecture & Database Performance Optimization',
                'excerpt' => 'Deep dive into Eloquent indexing, caching strategies, queue workers, and scalable database schema design.',
                'content' => 'Building high-scale applications requires clean architecture and efficient database queries. We analyze eager loading, query profiling, and Redis caching.',
                'status' => 'published',
            ],
            [
                'title' => 'UI/UX Design Principles Every Software Developer Should Master',
                'excerpt' => 'Create intuitive, accessible, and visually stunning web interfaces with dark mode palettes, crisp typography, and micro-interactions.',
                'content' => 'Design isn\'t just about aesthetics; it is about clear visual hierarchy, high-contrast typography, responsive layouts, and intuitive navigation feedback.',
                'status' => 'published',
            ],
        ];

        foreach ($posts as $postData) {
            BlogPost::updateOrCreate(
                ['slug' => Str::slug($postData['title'])],
                [
                    'user_id' => $admin->id,
                    'category_id' => $category ? $category->id : null,
                    'title' => $postData['title'],
                    'excerpt' => $postData['excerpt'],
                    'content' => $postData['content'],
                    'status' => $postData['status'],
                    'views' => rand(150, 2500),
                ]
            );
        }
    }
}
