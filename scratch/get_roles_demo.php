<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$roles = ['admin', 'instructor', 'mentor', 'freelancer', 'student'];

foreach ($roles as $role) {
    $user = App\Models\User::where('role', $role)->first();
    if (!$user) {
        $user = App\Models\User::create([
            'name' => ucfirst($role) . ' Demo',
            'email' => $role . '@skillverse.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => $role,
            'is_verified' => true,
        ]);
    }
    echo "{$user->role} | {$user->name} | {$user->email}\n";
}
