<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $freelancers = User::where('role', 'freelancer')->get();
        if ($freelancers->isEmpty()) return;

        $services = [
            'Jake Turner' => ['Web Development', 'API Development', 'WordPress', 'E-commerce Site'],
            'Sophia Lee' => ['Logo Design', 'Brand Identity', 'UI/UX Design', 'Social Media Kit'],
            'Marcus Brown' => ['SEO Optimization', 'Content Writing', 'Email Marketing', 'PPC Campaign'],
            'Elena Petrov' => ['Mobile App (Flutter)', 'Backend API', 'Database Design', 'Cloud Setup'],
            'Hassan Ali' => ['Video Editing', 'Animation', 'Motion Graphics', 'Thumbnail Design'],
        ];

        $categories = DB::table('categories')->get();
        $defaultCatId = $categories->first() ? $categories->first()->id : 1;

        foreach ($services as $name => $userServices) {
            $user = $freelancers->firstWhere('name', $name);
            if ($user) {
                foreach ($userServices as $serviceTitle) {
                    DB::table('services')->insert([
                        'user_id' => $user->id,
                        'title' => $serviceTitle,
                        'slug' => Str::slug($serviceTitle) . '-' . rand(100, 999),
                        'description' => $faker->paragraph,
                        'category_id' => $defaultCatId,
                        'price' => rand(50, 500),
                        'delivery_days' => rand(1, 7),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
