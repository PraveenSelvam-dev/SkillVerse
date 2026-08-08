<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $enrollments = DB::table('enrollments')->get();
        if ($enrollments->isEmpty()) return;

        $comments = [
            "Excellent course! The instructor explains concepts clearly.",
            "Great content but could use more practical examples.",
            "This course changed my career trajectory. Highly recommended!",
            "Well-structured curriculum. Worth every penny.",
            "Good course for beginners. Comprehensive coverage of topics."
        ];

        $reviewCount = 0;
        foreach ($enrollments as $enrollment) {
            if ($reviewCount >= 100) break;
            
            DB::table('course_reviews')->insert([
                'user_id' => $enrollment->user_id,
                'course_id' => $enrollment->course_id,
                'rating' => rand(3, 5),
                'comment' => $comments[array_rand($comments)],
                'created_at' => now()->subDays(rand(1, 15)),
                'updated_at' => now(),
            ]);
            $reviewCount++;
        }
    }
}
