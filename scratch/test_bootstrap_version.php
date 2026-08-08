<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = [
    '/tutorials/bootstrap',
    '/tutorials/bootstrap/versions',
    '/tutorials/bootstrap/b5-intro',
    '/tutorials/html/introduction',
    '/tutorials/css/selectors',
    '/tutorials/js/syntax',
    '/tutorials/sql/select',
    '/tutorials/python/variables',
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
