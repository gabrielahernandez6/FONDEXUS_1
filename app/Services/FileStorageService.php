<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class FileStorageService
{
    public function __construct(
        private readonly string $supabaseUrl,
        private readonly string $serviceRoleKey,
        private readonly string $bucket,
    ) {
        if ($this->supabaseUrl === '' || $this->serviceRoleKey === '' || $this->bucket === '') {
            throw new RuntimeException('Supabase Storage is not configured.');
        }
    }

    public static function fromConfig(): self
    {
        /** @var array{url:string|null, service_role_key:string|null, storage_bucket:string|null} $cfg */
        $cfg = config('services.supabase');

        return new self(
            (string) ($cfg['url'] ?? ''),
            (string) ($cfg['service_role_key'] ?? ''),
            (string) ($cfg['storage_bucket'] ?? ''),
        );
    }

    /**
     * @return array{bucket:string, path:string}
     */
    public function upload(string $path, UploadedFile $file, bool $upsert = false): array
    {
        $url = $this->storageBaseUrl().'/object/'.$this->bucket.'/'.$path;

        /** @var Response $response */
        $response = $this->rawClient()
            ->withHeaders([
                'x-upsert' => $upsert ? 'true' : 'false',
            ])
            ->withBody($file->getContent(), $file->getMimeType() ?: 'application/octet-stream')
            ->post($url);

        $this->throwIfFailed($response);

        return [
            'bucket' => $this->bucket,
            'path' => $path,
        ];
    }

    public function delete(string $path): void
    {
        $url = $this->storageBaseUrl().'/object/'.$this->bucket.'/'.$path;

        /** @var Response $response */
        $response = $this->rawClient()->delete($url);

        $this->throwIfFailed($response);
    }

    /**
     * @return array{signed_url:string, expires_in:int}
     */
    public function createSignedUrl(string $path, int $expiresInSeconds = 3600): array
    {
        $expiresInSeconds = max(60, min($expiresInSeconds, 60 * 60 * 24));

        $url = $this->storageBaseUrl().'/object/sign/'.$this->bucket.'/'.$path;

        /** @var Response $response */
        $response = $this->jsonClient()->post($url, [
            'expiresIn' => $expiresInSeconds,
        ]);

        $this->throwIfFailed($response);

        /** @var array{signedURL?:string} $data */
        $data = $response->json();

        $signedUrl = (string) ($data['signedURL'] ?? '');
        if ($signedUrl === '') {
            throw new RuntimeException('Supabase Storage did not return a signed URL.');
        }

        return [
            'signed_url' => $this->normalizeSignedUrl($signedUrl),
            'expires_in' => $expiresInSeconds,
        ];
    }

    private function normalizeSignedUrl(string $signedUrl): string
    {
        if (str_starts_with($signedUrl, 'http://') || str_starts_with($signedUrl, 'https://')) {
            return $signedUrl;
        }

        return rtrim($this->supabaseUrl, '/').$signedUrl;
    }

    private function storageBaseUrl(): string
    {
        return rtrim($this->supabaseUrl, '/').'/storage/v1';
    }

    private function baseClient(): PendingRequest
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer '.$this->serviceRoleKey,
            'apikey' => $this->serviceRoleKey,
        ]);
    }

    private function jsonClient(): PendingRequest
    {
        return $this->baseClient()->asJson();
    }

    private function rawClient(): PendingRequest
    {
        return $this->baseClient();
    }

    private function throwIfFailed(Response $response): void
    {
        try {
            $response->throw();
        } catch (RequestException $e) {
            throw new RuntimeException('Supabase Storage request failed: '.$e->getMessage(), previous: $e);
        }
    }
}
