<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            ['name' => 'Python', 'category' => 'Programming'],
            ['name' => 'JavaScript', 'category' => 'Programming'],
            ['name' => 'PHP', 'category' => 'Programming'],
            ['name' => 'Java', 'category' => 'Programming'],
            ['name' => 'C++', 'category' => 'Programming'],
            ['name' => 'Machine Learning', 'category' => 'AI & Machine Learning'],
            ['name' => 'Deep Learning', 'category' => 'AI & Machine Learning'],
            ['name' => 'React', 'category' => 'Web Development'],
            ['name' => 'Laravel', 'category' => 'Web Development'],
            ['name' => 'AWS', 'category' => 'Cloud Computing'],
            ['name' => 'Docker', 'category' => 'Cloud Computing'],
            ['name' => 'Figma', 'category' => 'UI/UX Design'],
            ['name' => 'SQL', 'category' => 'Data Science'],
            ['name' => 'Flutter', 'category' => 'Mobile Development'],
            // Add remaining to reach 60...
        ];
        
        // For simplicity in this implementation we just map category name to id roughly if categories exist
        // or just insert them directly if the table structure supports it.
        foreach ($skills as $skill) {
            $cat = DB::table('categories')->where('name', $skill['category'])->first();
            $catId = $cat ? $cat->id : 1;
            DB::table('skills')->insert([
                'name' => $skill['name'],
                'slug' => \Illuminate\Support\Str::slug($skill['name']),
                'category_id' => $catId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
