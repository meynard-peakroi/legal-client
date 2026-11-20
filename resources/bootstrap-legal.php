<?php

require_once __DIR__ . '/vendor/autoload.php';

use LegalDocs\Client\Config;
use LegalDocs\Client\Services\LegalClientService;

$config = new Config(
    apiUrl: $_ENV['LEGAL_API_URL'],
    apiKey: $_ENV['LEGAL_API_KEY'],
    brandDomain: $_ENV['LEGAL_API_BRAND_DOMAIN'],
);

$legal = new LegalClientService($config);
