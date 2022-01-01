<?php

use MostafaKamel\AdvertiseringSystem\Http\Controllers\AdController;

Route::get('advertisering-system/index', [AdController::class, 'index']);
