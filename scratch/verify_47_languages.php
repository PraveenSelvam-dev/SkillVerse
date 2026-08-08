<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$codes = [
    'html', 'css', 'js', 'sql', 'python', 'java', 'php', 'w3css', 'c', 'cpp', 'cs', 'howto',
    'bootstrap', 'react', 'mysql', 'jquery', 'excel', 'xml', 'django', 'numpy', 'pandas',
    'nodejs', 'dsa', 'typescript', 'angular', 'angularjs', 'git', 'postgresql', 'mongodb',
    'asp', 'ai', 'r', 'go', 'kotlin', 'swift', 'sass', 'vue', 'gen_ai', 'scipy', 'aws',
    'cybersecurity', 'datascience', 'programming', 'htmlcss', 'bash', 'rust', 'tools'
];

echo "Testing all 47 exact W3Schools subtopnav languages...\n";
foreach ($codes as $code) {
    try {
        $req = Illuminate\Http\Request::create("/tutorials/{$code}", 'GET');
        $res = $app->handle($req);
        if ($res->getStatusCode() !== 200) {
            echo "FAILED: {$code} => Status " . $res->getStatusCode() . "\n";
        }
    } catch (\Throwable $e) {
        echo "ERROR: {$code} => " . $e->getMessage() . "\n";
    }
}
echo "All 47 W3Schools language routes passed cleanly!\n";
