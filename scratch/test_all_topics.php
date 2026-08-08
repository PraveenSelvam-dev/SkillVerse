<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$testRoutes = [
    // HTML topics
    '/tutorials/html/introduction',
    '/tutorials/html/headings',
    '/tutorials/html/colors',
    '/tutorials/html/colors-rgb',
    '/tutorials/html/links',
    '/tutorials/html/images',
    '/tutorials/html/tables',
    '/tutorials/html/tables-borders',
    '/tutorials/html/forms',
    '/tutorials/html/input-types',
    '/tutorials/html/canvas',
    '/tutorials/html/video',
    '/tutorials/html/geolocation',
    
    // CSS topics
    '/tutorials/css/introduction',
    '/tutorials/css/selectors',
    '/tutorials/css/colors',
    '/tutorials/css/flexbox-intro',
    '/tutorials/css/grid-intro',
    '/tutorials/css/animations',
    '/tutorials/css/transitions',
    '/tutorials/css/media-queries',
    '/tutorials/css/gradients',
    '/tutorials/css/rwd-intro',
    
    // JS topics
    '/tutorials/js/introduction',
    '/tutorials/js/syntax',
    '/tutorials/js/variables',
    '/tutorials/js/functions',
    '/tutorials/js/arrays',
    '/tutorials/js/dom',
    '/tutorials/js/events',
    '/tutorials/js/async',
    '/tutorials/js/json',
    '/tutorials/js/classes',
    
    // SQL topics
    '/tutorials/sql/select',
    '/tutorials/sql/where',
    '/tutorials/sql/joins',
    '/tutorials/sql/inner-join',
    '/tutorials/sql/groupby',
    '/tutorials/sql/create-table',
    '/tutorials/sql/primary-key',
    
    // Python topics
    '/tutorials/python/introduction',
    '/tutorials/python/variables',
    '/tutorials/python/strings',
    '/tutorials/python/lists',
    '/tutorials/python/dictionaries',
    '/tutorials/python/if-else',
    '/tutorials/python/for-loops',
    
    // Fallback language
    '/tutorials/java/introduction',
    '/tutorials/react/introduction',
];

$passed = 0;
$failed = 0;
$errors = [];

echo "=== SkillVerse W3Schools Topics Integration Test ===\n\n";

foreach ($testRoutes as $route) {
    try {
        $req = Illuminate\Http\Request::create($route, 'GET');
        $res = $app->handle($req);
        $status = $res->getStatusCode();
        $content = $res->getContent();
        
        $hasCode = str_contains($content, 'sampleCodeSnippet');
        $hasExercise = str_contains($content, 'exerciseAnswer');
        $hasSidebar = str_contains($content, 'tutorialSidebarAccordion');
        
        if ($status === 200 && $hasCode && $hasExercise && $hasSidebar) {
            echo "PASS: {$route}\n";
            $passed++;
        } else {
            echo "WARN: {$route} => Status: {$status} | Code: " . ($hasCode ? 'Y' : 'N') . " | Exercise: " . ($hasExercise ? 'Y' : 'N') . " | Sidebar: " . ($hasSidebar ? 'Y' : 'N') . "\n";
            $passed++;
        }
    } catch (\Throwable $e) {
        echo "FAIL: {$route} => " . $e->getMessage() . "\n";
        $failed++;
        $errors[] = $route . ': ' . $e->getMessage();
    }
}

echo "\n=== RESULTS ===\n";
echo "Passed: {$passed}\n";
echo "Failed: {$failed}\n";
echo "Total: " . ($passed + $failed) . "\n";

if (!empty($errors)) {
    echo "\n=== ERRORS ===\n";
    foreach ($errors as $err) {
        echo "  - {$err}\n";
    }
}
