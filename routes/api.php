<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::get('/get-view', [ApiController::class, 'getView'])->name('get-view');
    Route::post('/supervision-report', [ApiController::class, 'supervisionReport'])->name('supervision-report');
});
