<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        $instructors = User::where('role', 'instructor')->get();
        if($instructors->isEmpty()) return;

        $coursesData = [
            ['Complete Python Bootcamp 2024', 'beginner', 49.99, 'Sarah Johnson'],
            ['Laravel 12 Masterclass', 'intermediate', 79.99, 'Michael Chen'],
            ['AI & Machine Learning A-Z', 'all_levels', 99.99, 'Emily Rodriguez'],
            ['React & Next.js Full Course', 'intermediate', 59.99, 'David Kim'],
            ['AWS Cloud Practitioner Exam Prep', 'beginner', 39.99, 'Alex Thompson'],
            ['UI/UX Design with Figma', 'beginner', 44.99, 'Priya Patel'],
            ['Cybersecurity Fundamentals', 'beginner', 54.99, 'James Wilson'],
            ['Flutter Mobile Development', 'intermediate', 69.99, 'Lisa Wang'],
            ['Data Science with Python', 'all_levels', 89.99, 'Robert Garcia'],
            ['Full Stack Web Development', 'all_levels', 129.99, 'Aisha Mohammed'],
        ];

        $categories = DB::table('categories')->get();
        $defaultCatId = $categories->first() ? $categories->first()->id : 1;

        foreach ($coursesData as $index => $data) {
            $instructor = $instructors->firstWhere('name', $data[3]) ?? $instructors->random();
            
            $courseId = DB::table('courses')->insertGetId([
                'title' => $data[0],
                'slug' => Str::slug($data[0]),
                'category_id' => $defaultCatId,
                'short_description' => $faker->sentence,
                'description' => $faker->paragraphs(3, true),
                'level' => $data[1],
                'price' => $data[2],
                'instructor_id' => $instructor->id,
                'status' => 'published',
                'is_featured' => $index < 5,
                'requirements' => $faker->paragraph,
                'what_you_learn' => json_encode([$faker->sentence, $faker->sentence]),
                'target_audience' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add sections & lessons
            for ($i = 1; $i <= 4; $i++) {
                $sectionId = DB::table('course_sections')->insertGetId([
                    'course_id' => $courseId,
                    'title' => 'Section ' . $i . ': ' . $faker->words(3, true),
                    'position' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                for ($j = 1; $j <= 4; $j++) {
                    DB::table('lessons')->insert([
                        'section_id' => $sectionId,
                        'title' => 'Lesson ' . $j . ': ' . $faker->words(4, true),
                        'type' => $j == 4 ? 'quiz' : 'video',
                        'video_url' => $j != 4 ? '/videos/sample-lesson.mp4' : null,
                        'content' => $j == 4 ? null : $faker->paragraph,
                        'position' => $j,
                        'is_free_preview' => ($i == 1 && $j == 1),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
