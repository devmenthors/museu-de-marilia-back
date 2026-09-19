<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/public/img/{id}', [ImageController::class, 'show'])->where('id', '.*');
// TODO:
// Route::get('/img/{id}', [ImageController::class, 'show'])->where('id', '.*');
