<?php

$packageRoot = dirname(__DIR__);
$projectRoot = dirname(dirname(dirname(dirname(__FILE__))));

$files = [
    $packageRoot . '/resources/bootstrap-legal.php' => $projectRoot . '/bootstrap-legal.php',
    $packageRoot . '/resources/.env.legal.example' => $projectRoot . '/.env',
];

foreach ($files as $source => $destination) {
    if (! file_exists($destination)) {
        copy($source, $destination);
        echo sprintf("Published: %s\n", basename($destination));
    } else {
        echo sprintf("Skipped: %s already exists\n", basename($destination));
    }
}
