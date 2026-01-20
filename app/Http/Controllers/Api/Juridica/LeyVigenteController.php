<?php

namespace App\Http\Controllers\Api\Juridica;

use App\Http\Controllers\Controller;
use App\Http\Requests\Juridica\LeyVigenteStoreRequest;
use App\Http\Requests\Juridica\LeyVigenteUpdateRequest;
use App\Http\Resources\Juridica\LeyVigenteResource;
use App\Models\Juridica\LeyVigente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeyVigenteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(LeyVigente::class, 'ley_vigente');
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = max(1, min((int) $request->integer('per_page', 15), 100));

        $leyes = LeyVigente::query()
            ->orderByDesc('id')
            ->paginate($perPage);

        return LeyVigenteResource::collection($leyes);
    }

    public function store(LeyVigenteStoreRequest $request): LeyVigenteResource
    {
        $ley = LeyVigente::query()->create($request->validated());

        return LeyVigenteResource::make($ley);
    }

    public function show(LeyVigente $leyVigente): LeyVigenteResource
    {
        return LeyVigenteResource::make($leyVigente);
    }

    public function update(LeyVigenteUpdateRequest $request, LeyVigente $leyVigente): LeyVigenteResource
    {
        $leyVigente->fill($request->validated());
        $leyVigente->save();

        return LeyVigenteResource::make($leyVigente);
    }

    public function destroy(LeyVigente $leyVigente): Response
    {
        $leyVigente->delete();

        return response()->noContent();
    }
}
