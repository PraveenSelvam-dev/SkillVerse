<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = [
    '/tutorials',
    '/tutorials/html',
    '/tutorials/html/introduction',
    '/tutorials/python/variables',
    '/tutorials/js/syntax',
];

foreach ($routes as $route) {
    try {
        $req = Illuminate\Http\Request::create($route, 'GET');
        $res = $app->handle($req);
        echo "Route: {$route} => Status: " . $res->getStatusCode() . "\n";
    } catch (\Throwable $e) {
        echo "Route: {$route} => ERROR: " . $e->getMessage() . "\n";
    }
}
