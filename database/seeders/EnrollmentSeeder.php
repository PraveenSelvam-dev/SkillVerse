<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        $students = User::where('role', 'student')->get();
        $courses = DB::table('courses')->pluck('id')->toArray();

        if (empty($courses) || $students->isEmpty()) return;

        foreach ($students as $student) {
            $enrolledCourses = (array) array_rand(array_flip($courses), rand(3, 8));
            foreach ($enrolledCourses as $courseId) {
                DB::table('enrollments')->insert([
                    'user_id' => $student->id,
                    'course_id' => $courseId,
                    'progress' => rand(0, 100),
                    'completed_at' => rand(0, 1) ? now() : null,
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
