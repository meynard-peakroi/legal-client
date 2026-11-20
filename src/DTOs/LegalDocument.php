<?php

namespace LegalDocs\Client\DTOs;

final readonly class LegalDocument
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $contentHtml,
        public ?string $effectiveDate = null,
        public ?string $version = null,
    ) {
    }
}