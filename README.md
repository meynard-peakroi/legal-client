# Legal Document Client

This package is used as an API client to the Legal Document Platform which can used across supported brand websites


## Requirements

 - PHP 8.4.27


## Setup

 - Create a composer file and paste code as content
```bash
touch composer.json
nano composer.json
```
```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:meynard-peakroi/legal-client.git"
    }
  ],

  "require": {
    "meynard-peakroi/legal-client": "^1.0"
  }
}
```

 - Install the package
```bash
composer install
```
Upon installing the package two things happen:
1. Creates a copy of .env file from this package's resources/.env.legal.example
2. Creates a copy of bootstrap-legal.php file from this package's resources/bootstrap-legal.php

## Sample usages
```php
# /public/terms.php file

use LegalDocs\Client\Services\LegalDocumentRenderer;
require_once __DIR__ . '/../bootstrap-legal.php';

echo LegalDocumentRenderer::render($legal, 'terms')
```

```php
# /public/ccpa.php file

use LegalDocs\Client\Services\LegalDocumentRenderer;
require_once __DIR__ . '/../bootstrap-legal.php';

echo LegalDocumentRenderer::render($legal, 'ccpa')
```