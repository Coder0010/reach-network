<?php

use MostafaKamel\AdvertiseringSystem\Http\Controllers\AdController;

Route::get('advertisering-system', [AdController::class, 'index']);
Route::get('advertisering-system/{id}', [AdController::class, 'show']);
