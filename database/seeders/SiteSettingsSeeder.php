<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            'site_name' => 'SkillVerse',
            'site_description' => 'Learn • Teach • Earn',
            'commission_rate' => '20',
            'min_withdrawal' => '50',
            'currency' => 'USD',
            'maintenance_mode' => 'false',
            'registration_open' => 'true',
            'email_verification' => 'false',
        ];

        foreach ($settings as $key => $value) {
            DB::table('site_settings')->insert([
                'key' => $key,
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
