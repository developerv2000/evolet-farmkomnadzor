<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-view', [MainController::class, 'getView'])->name('api.get-view');
