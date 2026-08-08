<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['Programming', 'fa-code'],
            ['AI & Machine Learning', 'fa-robot'],
            ['Cloud Computing', 'fa-cloud'],
            ['Cybersecurity', 'fa-shield-halved'],
            ['Web Development', 'fa-globe'],
            ['Mobile Development', 'fa-mobile-screen'],
            ['UI/UX Design', 'fa-palette'],
            ['Business', 'fa-briefcase'],
            ['Marketing', 'fa-bullhorn'],
            ['Photography', 'fa-camera'],
            ['Music', 'fa-music'],
            ['Cooking', 'fa-utensils'],
            ['Fitness', 'fa-dumbbell'],
            ['Finance', 'fa-chart-line'],
            ['Language', 'fa-language'],
            ['Engineering', 'fa-gears'],
            ['Design', 'fa-pen-ruler'],
            ['Animation', 'fa-film'],
            ['Gaming', 'fa-gamepad'],
            ['Data Science', 'fa-database'],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insert([
                'name' => $cat[0],
                'slug' => Str::slug($cat[0]),
                'icon' => $cat[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
