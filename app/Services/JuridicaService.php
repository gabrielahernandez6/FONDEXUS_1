<?php

namespace App\Services;

use App\Models\Juridica\ProcesoJuridico;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class JuridicaService
{
    public function __construct(private readonly FileStorageService $storage)
    {
    }

    public static function fromConfig(): self
    {
        return new self(FileStorageService::fromConfig());
    }

    public function attachProcesoDocumento(ProcesoJuridico $proceso, UploadedFile $file): ProcesoJuridico
    {
        $extension = $file->getClientOriginalExtension();
        $extension = $extension !== '' ? $extension : 'bin';

        $path = 'juridica/procesos/'.$proceso->id.'/'.Str::uuid()->toString().'.'.$extension;

        $this->storage->upload($path, $file);

        $proceso->forceFill([
            'documento_path' => $path,
            'documento_nombre' => $file->getClientOriginalName(),
            'documento_mime' => $file->getClientMimeType() ?: $file->getMimeType(),
            'documento_size' => $file->getSize(),
        ]);

        $proceso->save();

        return $proceso;
    }

    public function deleteProcesoDocumento(ProcesoJuridico $proceso): ProcesoJuridico
    {
        $oldPath = (string) ($proceso->documento_path ?? '');

        if ($oldPath !== '') {
            $this->storage->delete($oldPath);
        }

        $proceso->forceFill([
            'documento_path' => null,
            'documento_nombre' => null,
            'documento_mime' => null,
            'documento_size' => null,
        ]);

        $proceso->save();

        return $proceso;
    }

    /**
     * @return array{signed_url:string, expires_in:int}|null
     */
    public function createProcesoDocumentoSignedUrl(ProcesoJuridico $proceso, int $expiresInSeconds = 3600): array|null
    {
        $path = (string) ($proceso->documento_path ?? '');
        if ($path === '') {
            return null;
        }

        return $this->storage->createSignedUrl($path, $expiresInSeconds);
    }
}
