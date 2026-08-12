<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$testRoutes = [
    '/tutorials/python/variable-names',
    '/tutorials/python/variables',
    '/tutorials/html/introduction',
    '/tutorials/css/flexbox-intro',
    '/tutorials/js/syntax',
    '/tutorials/sql/select',
];

echo "=== SkillVerse Full Topic Layout Format Verification ===\n\n";

foreach ($testRoutes as $route) {
    try {
        $req = Illuminate\Http\Request::create($route, 'GET');
        $res = $app->handle($req);
        $status = $res->getStatusCode();
        $content = $res->getContent();
        
        $hasBookmark = str_contains($content, 'bookmark-btn');
        $hasNextPrev = str_contains($content, 'nextprev');
        $hasExampleLegal = str_contains($content, 'w3-example');
        $hasExampleIllegal = str_contains($content, 'w3-example-red');
        $hasNote = str_contains($content, 'ws-note');
        $hasExercise = str_contains($content, 'exercisecontainer');
        
        echo "ROUTE: {$route} (Status: {$status})\n";
        echo "  - Bookmark Button: " . ($hasBookmark ? "YES" : "NO") . "\n";
        echo "  - NextPrev Navigation: " . ($hasNextPrev ? "YES" : "NO") . "\n";
        echo "  - Legal Example Box: " . ($hasExampleLegal ? "YES" : "NO") . "\n";
        echo "  - Illegal Example Box: " . ($hasExampleIllegal ? "YES" : "NO") . "\n";
        echo "  - Note Box: " . ($hasNote ? "YES" : "NO") . "\n";
        echo "  - Quiz Exercise Container: " . ($hasExercise ? "YES" : "NO") . "\n\n";
    } catch (\Throwable $e) {
        echo "FAIL: {$route} => " . $e->getMessage() . "\n";
    }
}
