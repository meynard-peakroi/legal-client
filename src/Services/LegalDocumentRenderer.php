<?php

namespace LegalDocs\Client\Services;

use JsonException;

class LegalDocumentRenderer
{
    /**
     * @throws JsonException
     */
    public static function render(
        LegalClientService $client,
        string $slug,
    ): string {
        $document = $client->getDocument($slug);

        return $document->contentHtml;
    }
}