<?php

namespace App\Http\Controllers\Api\Juridica;

use App\Http\Controllers\Controller;
use App\Http\Requests\Juridica\PublicacionSecopStoreRequest;
use App\Http\Requests\Juridica\PublicacionSecopUpdateRequest;
use App\Http\Resources\Juridica\PublicacionSecopResource;
use App\Models\Juridica\PublicacionSecop;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicacionSecopController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PublicacionSecop::class, 'publicacion_secop');
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = max(1, min((int) $request->integer('per_page', 15), 100));

        $publicaciones = PublicacionSecop::query()
            ->with(['procesoJuridico'])
            ->orderByDesc('id')
            ->paginate($perPage);

        return PublicacionSecopResource::collection($publicaciones);
    }

    public function store(PublicacionSecopStoreRequest $request): PublicacionSecopResource
    {
        $publicacion = PublicacionSecop::query()->create($request->validated());

        return PublicacionSecopResource::make($publicacion->load(['procesoJuridico']));
    }

    public function show(PublicacionSecop $publicacionSecop): PublicacionSecopResource
    {
        return PublicacionSecopResource::make($publicacionSecop->load(['procesoJuridico']));
    }

    public function update(PublicacionSecopUpdateRequest $request, PublicacionSecop $publicacionSecop): PublicacionSecopResource
    {
        $publicacionSecop->fill($request->validated());
        $publicacionSecop->save();

        return PublicacionSecopResource::make($publicacionSecop->load(['procesoJuridico']));
    }

    public function destroy(PublicacionSecop $publicacionSecop): Response
    {
        $publicacionSecop->delete();

        return response()->noContent();
    }
}
