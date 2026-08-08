<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$roles = ['admin', 'instructor', 'mentor', 'freelancer', 'student', 'community_manager', 'job_client'];

foreach ($roles as $role) {
    $user = App\Models\User::where('role', $role)->first();
    if ($user) {
        echo "Role: {$user->role} | Email: {$user->email} | Name: {$user->name}\n";
    } else {
        // Create user for role if missing
        $newUser = App\Models\User::create([
            'name' => ucfirst(str_replace('_', ' ', $role)) . ' User',
            'email' => $role . '@skillverse.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => $role,
            'is_verified' => true,
        ]);
        echo "Role: {$newUser->role} | Email: {$newUser->email} | Name: {$newUser->name} (Created)\n";
    }
}
