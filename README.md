# Legal Document Client

This package is used as an API client to the Legal Document Platform which can used across supported brand websites


## Requirements

 - PHP 8.4.27


## Setup

 - Install package via composer
 - Create a new composer file if not exists
```bash
touch composer.json
```
 - Edit composer file and paste code below `nano composer.json`
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
php vendor/bin/legaldocs-install
```
Upon installing the package two things happen:
1. Creates a copy of this package's resources/config.php to ../legal/config.php
2. Creates a copy of this package's resources/bootstrap-legal.php to ../legal/bootstrap-legal.php

@NOTE: Since Forge have symlinks from current >> releases/*, we copy the two files above on the site's root dir
```text
~/hs-legal-vzk7wsv7.on-forge.com
|----- current
|----- legal
    |----- .env
    |_____ bootstrap-legal.php
    
|----- releases
```

## Sample usages
```php
# /public/terms.php file

use LegalDocs\Client\Services\LegalDocumentRenderer;
require_once __DIR__ . /../../../legal/bootstrap-legal.php;

echo LegalDocumentRenderer::render($legal, 'terms');
```

```php
# /public/ccpa.php file

use LegalDocs\Client\Services\LegalDocumentRenderer;
require_once __DIR__ . /../../../legal/bootstrap-legal.php;

echo LegalDocumentRenderer::render($legal, 'ccpa');
```