<?php

use MostafaKamel\AdvertiseringSystem\Http\Controllers\AdController;
use MostafaKamel\AdvertiseringSystem\Http\Controllers\FilterController;

Route::group(['prefix' => 'api/advertisering-system'], function () {
    Route::get('ads', [AdController::class, 'index']);
    Route::get('ads/{id}/show', [AdController::class, 'show']);

    Route::resource('filters', FilterController::class)->except('create', 'edit');
});
