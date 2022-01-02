<?php

namespace MostafaKamel\AdvertiseringSystem\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MostafaKamel\AdvertiseringSystem\Http\Requests\FilterRequest;
use Facades\MostafaKamel\AdvertiseringSystem\Services\FilterService;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->apiJsonResponse([
            "data" => FilterService::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FilterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request)
    {
        DB::beginTransaction();
        try {
            $entity = FilterService::create($request->all());
            if ($entity) {
                $message = "record {$entity->name} created successfully";
            } else {
                $message = "record not created";
            }
            DB::commit();
            return $this->apiJsonResponse([
                "data" => $message,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->apiJsonResponse([
                "data" => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
