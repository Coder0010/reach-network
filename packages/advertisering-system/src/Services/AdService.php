<?php

namespace MostafaKamel\AdvertiseringSystem\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use MostafaKamel\AdvertiseringSystem\Models\Ad;

class AdService
{
    public function all(): Collection
    {
        return Ad::latest()->get();
    }

    public function show($id): Model
    {
        return Ad::findOrFail($id);
    }
}
