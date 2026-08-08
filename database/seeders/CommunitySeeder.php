<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CommunitySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $owner = User::where('name', 'Michael Chen')->first() ?? User::first();
        if (!$owner) return;

        $communities = [
            'Laravel Developers' => 12500,
            'Python Engineers' => 18000,
            'AI Innovators' => 8200,
            'Design Masters' => 6100,
            'Startup Founders' => 4500,
            'Cloud Architects' => 3800,
            'React Developers' => 9300,
            'Cybersecurity Pros' => 5400,
        ];

        foreach ($communities as $name => $members) {
            DB::table('communities')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->paragraph,
                'owner_id' => $owner->id,
                'member_count' => $members,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
