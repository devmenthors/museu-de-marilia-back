<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/data/img/{id}', [ImageController::class, "show"])->where("id", ".*");
