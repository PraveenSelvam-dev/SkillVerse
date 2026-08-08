<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = [
    '/instructor/dashboard',
    '/mentor/dashboard',
    '/freelancer/dashboard',
    '/community-dashboard',
    '/dashboard',
    '/admin'
];

foreach ($routes as $route) {
    try {
        $req = Illuminate\Http\Request::create($route, 'GET');
        // Login as admin for superuser test
        $user = App\Models\User::where('role', 'admin')->first();
        auth()->login($user);
        
        $res = $app->handle($req);
        echo "Route: {$route} => Status: " . $res->getStatusCode() . "\n";
    } catch (\Throwable $e) {
        echo "Route: {$route} => ERROR: " . $e->getMessage() . "\n";
    }
}
