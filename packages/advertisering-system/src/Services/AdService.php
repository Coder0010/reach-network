<?php

namespace MostafaKamel\AdvertiseringSystem\Services;

use Illuminate\Http\Response;
use MostafaKamel\AdvertiseringSystem\Models\Ad;
use MostafaKamel\AdvertiseringSystem\Http\Resources\AdResource;

class AdService
{
    public function all()
    {
        $all = Ad::all();
        return response()->json([
            "message" => "all data",
            "data"    => AdResource::collection($all)
        ], 200);
    }

    public function show($id)
    {
        $show = Ad::findOrFail($id);
        return response()->json([
            "message" => "{$show->name} service data",
            "data"    => new AdResource($show)
        ], 200);
    }
}
