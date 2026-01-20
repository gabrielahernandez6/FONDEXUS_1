<?php

namespace App\Http\Controllers\Api\Juridica;

use App\Http\Controllers\Controller;
use App\Http\Requests\Juridica\ProcesoJuridicoDocumentoStoreRequest;
use App\Http\Requests\Juridica\ProcesoJuridicoStoreRequest;
use App\Http\Requests\Juridica\ProcesoJuridicoUpdateRequest;
use App\Http\Resources\Juridica\ProcesoJuridicoResource;
use App\Models\Juridica\ProcesoJuridico;
use App\Services\JuridicaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProcesoJuridicoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProcesoJuridico::class, 'proceso_juridico');
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = max(1, min((int) $request->integer('per_page', 15), 100));

        $procesos = ProcesoJuridico::query()
            ->with(['responsable'])
            ->orderByDesc('id')
            ->paginate($perPage);

        return ProcesoJuridicoResource::collection($procesos);
    }

    public function store(ProcesoJuridicoStoreRequest $request): ProcesoJuridicoResource
    {
        $proceso = ProcesoJuridico::query()->create($request->validated());

        return ProcesoJuridicoResource::make($proceso->load(['responsable']));
    }

    public function show(ProcesoJuridico $procesoJuridico): ProcesoJuridicoResource
    {
        return ProcesoJuridicoResource::make($procesoJuridico->load(['responsable', 'publicacionesSecop']));
    }

    public function update(ProcesoJuridicoUpdateRequest $request, ProcesoJuridico $procesoJuridico): ProcesoJuridicoResource
    {
        $procesoJuridico->fill($request->validated());
        $procesoJuridico->save();

        return ProcesoJuridicoResource::make($procesoJuridico->load(['responsable']));
    }

    public function destroy(ProcesoJuridico $procesoJuridico): Response
    {
        $procesoJuridico->delete();

        return response()->noContent();
    }

    public function uploadDocumento(ProcesoJuridicoDocumentoStoreRequest $request, ProcesoJuridico $proceso_juridico): ProcesoJuridicoResource
    {
        $service = JuridicaService::fromConfig();

        $service->attachProcesoDocumento($proceso_juridico, $request->file('documento'));

        return ProcesoJuridicoResource::make($proceso_juridico->fresh()->load(['responsable']));
    }

    public function documentoSignedUrl(Request $request, ProcesoJuridico $proceso_juridico): JsonResponse
    {
        $this->authorize('view', $proceso_juridico);

        $expiresIn = max(60, min((int) $request->integer('expires_in', 3600), 60 * 60 * 24));

        $service = JuridicaService::fromConfig();
        $data = $service->createProcesoDocumentoSignedUrl($proceso_juridico, $expiresIn);

        if ($data === null) {
            return response()->json(['message' => 'Documento no encontrado.'], 404);
        }

        return response()->json($data);
    }

    public function deleteDocumento(Request $request, ProcesoJuridico $proceso_juridico): ProcesoJuridicoResource
    {
        $this->authorize('update', $proceso_juridico);

        $service = JuridicaService::fromConfig();
        $service->deleteProcesoDocumento($proceso_juridico);

        return ProcesoJuridicoResource::make($proceso_juridico->fresh()->load(['responsable']));
    }
}
