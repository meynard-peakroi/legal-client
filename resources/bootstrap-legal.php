<?php

require_once __DIR__ . '/vendor/autoload.php';

$configValues = require __DIR__ . '/config.php';

use LegalDocs\Client\Config;
use LegalDocs\Client\Services\LegalClientService;

$config = new Config(
    apiUrl: $configValues['LEGAL_API_URL'],
    apiKey: $configValues['LEGAL_API_KEY'],
    brandDomain: $_SERVER['HTTP_HOST'],
);

$legal = new LegalClientService($config);
