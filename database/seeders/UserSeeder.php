<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $password = Hash::make('password');

        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@skillverse.com',
            'password' => $password,
            'role' => 'admin',
            'is_verified' => true,
            'bio' => 'System Administrator for SkillVerse.',
        ]);

        // Instructors
        $instructors = [
            'Sarah Johnson', 'Michael Chen', 'Emily Rodriguez', 'David Kim', 
            'Alex Thompson', 'Priya Patel', 'James Wilson', 'Lisa Wang', 
            'Robert Garcia', 'Aisha Mohammed'
        ];

        foreach ($instructors as $instructor) {
            User::create([
                'name' => $instructor,
                'email' => strtolower(str_replace(' ', '.', $instructor)) . '@example.com',
                'password' => $password,
                'role' => 'instructor',
                'is_verified' => true,
                'bio' => $faker->paragraph,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
            ]);
        }

        // Mentors
        $mentors = ['Dr. Andrew Foster', 'Rachel Kim', 'Chris Martinez', 'Nina Sharma', 'Tom Harrison'];
        foreach ($mentors as $mentor) {
            User::create([
                'name' => $mentor,
                'email' => strtolower(str_replace([' ', '.'], ['.', ''], $mentor)) . '@example.com',
                'password' => $password,
                'role' => 'mentor',
                'is_verified' => true,
                'bio' => $faker->paragraph,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
            ]);
        }

        // Freelancers
        $freelancers = ['Jake Turner', 'Sophia Lee', 'Marcus Brown', 'Elena Petrov', 'Hassan Ali'];
        foreach ($freelancers as $freelancer) {
            User::create([
                'name' => $freelancer,
                'email' => strtolower(str_replace(' ', '.', $freelancer)) . '@example.com',
                'password' => $password,
                'role' => 'freelancer',
                'is_verified' => true,
                'bio' => $faker->paragraph,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
            ]);
        }

        // Students
        for ($i = 0; $i < 29; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => $password,
                'role' => 'student',
                'is_verified' => $faker->boolean(80),
                'bio' => $faker->paragraph,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
