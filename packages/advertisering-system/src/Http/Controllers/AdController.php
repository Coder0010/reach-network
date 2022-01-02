<?php

namespace MostafaKamel\AdvertiseringSystem\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use MostafaKamel\AdvertiseringSystem\Http\Resources\AdResource;
use Facades\MostafaKamel\AdvertiseringSystem\Services\AdService;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "payload" => [
                "data" => AdService::all()
            ]
        ], 200);
    }

    public function show(Request $request)
    {
        $show = AdService::show($request->id);
        return $this->apiJsonResponse([
            "data" => [
                "related" => $show->related_ads() ? AdResource::collection($show->related_ads()) : new Collection(),
                "show"    => new AdResource($show),
            ]
        ], 200);
    }
    
}
