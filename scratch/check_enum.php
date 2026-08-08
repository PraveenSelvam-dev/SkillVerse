<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$cols = \Illuminate\Support\Facades\DB::select("SHOW COLUMNS FROM users LIKE 'role'");
echo "Role Column Definition: " . $cols[0]->Type . "\n";
