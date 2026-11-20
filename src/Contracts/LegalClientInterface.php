<?php

namespace LegalDocs\Client\Contracts;

use LegalDocs\Client\DTOs\LegalDocument;

interface LegalClientInterface
{
    public function getDocument(string $slug): LegalDocument;
}