<?php

use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

Route::post('/word-game', [WordController::class, 'submit']);