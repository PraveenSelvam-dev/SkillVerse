<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SkillSeeder::class,
            CourseSeeder::class,
            EnrollmentSeeder::class,
            ReviewSeeder::class,
            MentorSeeder::class,
            ServiceSeeder::class,
            CommunitySeeder::class,
            BlogSeeder::class,
            JobSeeder::class,
            WalletSeeder::class,
            TransactionSeeder::class,
            WithdrawalSeeder::class,
            CouponSeeder::class,
            NotificationSeeder::class,
            ConversationSeeder::class,
            SupportTicketSeeder::class,
            PageSeeder::class,
            SiteSettingsSeeder::class,
            CertificateSeeder::class,
        ]);
    }
}
