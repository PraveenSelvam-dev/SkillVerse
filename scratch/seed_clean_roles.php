<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$demoAccounts = [
    'admin' => ['name' => 'Admin User', 'email' => 'admin@skillverse.com'],
    'instructor' => ['name' => 'Sarah Johnson (Instructor)', 'email' => 'instructor@skillverse.com'],
    'mentor' => ['name' => 'Dr. Andrew Foster (Mentor)', 'email' => 'mentor@skillverse.com'],
    'freelancer' => ['name' => 'Jake Turner (Freelancer)', 'email' => 'freelancer@skillverse.com'],
    'student' => ['name' => 'Alex Rivera (Student)', 'email' => 'student@skillverse.com'],
];

foreach ($demoAccounts as $role => $data) {
    App\Models\User::updateOrCreate(
        ['email' => $data['email']],
        [
            'name' => $data['name'],
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => $role,
            'is_verified' => true,
        ]
    );
}

echo "All 5 demo accounts updated successfully!\n";
