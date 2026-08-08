<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MentorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $mentorsData = [
            'Dr. Andrew Foster' => ['AI Strategy', 15, 150],
            'Rachel Kim' => ['Product Design', 8, 100],
            'Chris Martinez' => ['Full Stack Development', 10, 120],
            'Nina Sharma' => ['Cloud Architecture', 12, 130],
            'Tom Harrison' => ['Business & Startups', 20, 175],
        ];

        foreach ($mentorsData as $name => $data) {
            $user = User::where('name', $name)->first();
            if ($user) {
                DB::table('mentor_profiles')->insert([
                    'user_id' => $user->id,
                    'title' => 'Senior ' . $data[0] . ' Mentor',
                    'expertise' => $data[0],
                    'experience_years' => $data[1],
                    'hourly_rate' => $data[2],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
