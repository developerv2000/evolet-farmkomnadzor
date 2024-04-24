<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::post('/supervision-report', [MainController::class, 'supervisionReport'])->name('supervision-report');
