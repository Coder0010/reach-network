<?php

namespace MostafaKamel\AdvertiseringSystem\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facades\MostafaKamel\AdvertiseringSystem\Services\AdService;

class AdController extends Controller
{
    public function index()
    {
        return AdService::all();
    }

    public function show(Request $request)
    {
        return AdService::show($request->id);
    }
}
