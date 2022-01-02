<?php

namespace MostafaKamel\AdvertiseringSystem\Services;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use MostafaKamel\AdvertiseringSystem\Models\Filter;

class FilterService
{
    public function all(): Collection
    {
        return Filter::latest()->get();
    }

    public function show(int $id): Model
    {
        return Filter::findOrFail($id);
    }

    public function create(array $request) 
    {
        return Filter::create($request);
    }

}
