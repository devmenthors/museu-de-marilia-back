<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/data/img/{id}', [ImageController::class, 'show'])->where('id', '.*');
