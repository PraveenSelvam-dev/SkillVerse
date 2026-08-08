<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = [
    '/tutorials/html',
    '/tutorials/css',
    '/tutorials/js',
    '/tutorials/sql',
    '/tutorials/python',
    '/tutorials/java',
    '/tutorials/php',
    '/tutorials/c',
    '/tutorials/cpp',
    '/tutorials/cs',
    '/tutorials/bootstrap',
    '/tutorials/react',
    '/tutorials/mysql',
    '/tutorials/jquery',
    '/tutorials/excel',
    '/tutorials/xml',
    '/tutorials/django',
    '/tutorials/numpy',
    '/tutorials/pandas',
    '/tutorials/nodejs',
    '/tutorials/dsa',
    '/tutorials/typescript',
    '/tutorials/angular',
    '/tutorials/git',
    '/tutorials/postgresql',
    '/tutorials/mongodb',
    '/tutorials/ai',
    '/tutorials/r',
    '/tutorials/go',
    '/tutorials/kotlin',
    '/tutorials/swift',
    '/tutorials/sass',
    '/tutorials/vue',
    '/tutorials/gen_ai',
    '/tutorials/aws',
    '/tutorials/cybersecurity',
    '/tutorials/datascience',
    '/tutorials/laravel',
    '/tutorials/bash',
    '/tutorials/rust',
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
