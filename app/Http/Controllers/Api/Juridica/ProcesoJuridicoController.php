<?php

namespace App\Http\Controllers\Api\Juridica;

use App\Http\Controllers\Controller;
use App\Http\Requests\Juridica\ProcesoJuridicoStoreRequest;
use App\Http\Requests\Juridica\ProcesoJuridicoUpdateRequest;
use App\Http\Resources\Juridica\ProcesoJuridicoResource;
use App\Models\Juridica\ProcesoJuridico;
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
}
