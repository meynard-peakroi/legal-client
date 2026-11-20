<?php

namespace LegalDocs\Client\Services;

use JsonException;
use LegalDocs\Client\Config;
use LegalDocs\Client\Contracts\LegalClientInterface;
use LegalDocs\Client\DTOs\LegalDocument;
use RuntimeException;

readonly class LegalClientService implements LegalClientInterface
{
    public function __construct(
        private Config $config
    ) {
    }

    /**
     * @param string $slug
     * @return LegalDocument
     * @throws JsonException
     */
    public function getDocument(
        string $slug,
    ): LegalDocument {
        $url = sprintf(
            '%s/api/legal/documents/%s',
            rtrim(
                $this->config->apiUrl,
                '/'
            ),
            $slug
        );

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'X-API-Key: ' . $this->config->apiKey,
                'X-Brand-Domain: ' . $this->config->brandDomain,
            ],
        ]);

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            throw new RuntimeException($error);
        }

        if ($status !== 200) {
            throw new RuntimeException("Legal API returned HTTP {$status}");
        }

        $payload = json_decode(
            $response,
            true,
            flags: JSON_THROW_ON_ERROR
        );

        return new LegalDocument(
            title: $payload['title'] ?? '',
            slug: $payload['slug'] ?? '',
            contentHtml: $payload['content_html'] ?? '',
            effectiveDate: $payload['effective_date'] ?? null,
            version: $payload['version'] ?? null,
        );
    }
}