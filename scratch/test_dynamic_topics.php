<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$testTopics = [
    '/tutorials/html/headings',
    '/tutorials/html/paragraphs',
    '/tutorials/html/colors',
    '/tutorials/html/links',
    '/tutorials/html/images',
    '/tutorials/html/tables',
    '/tutorials/html/forms',
    '/tutorials/css/colors',
    '/tutorials/css/flexbox',
    '/tutorials/js/variables',
    '/tutorials/js/functions',
    '/tutorials/js/dom',
    '/tutorials/sql/select',
    '/tutorials/sql/where',
];

echo "Testing dynamic execution of specific topics...\n";
foreach ($testTopics as $route) {
    try {
        $req = Illuminate\Http\Request::create($route, 'GET');
        $res = $app->handle($req);
        $content = $res->getContent();
        
        $hasCode = str_contains($content, 'sampleCodeSnippet');
        $hasExercise = str_contains($content, 'exerciseAnswer');
        
        echo "Route: {$route} => Status: " . $res->getStatusCode() . " | Dynamic Code: " . ($hasCode ? 'YES' : 'NO') . " | Dynamic Exercise: " . ($hasExercise ? 'YES' : 'NO') . "\n";
    } catch (\Throwable $e) {
        echo "ERROR: {$route} => " . $e->getMessage() . "\n";
    }
}
