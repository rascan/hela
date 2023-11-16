<?php

use Illuminate\Support\Facades\Route;
use Rascan\Hela\Http\Controllers\LogController;

Route::get('logs', [LogController::class, 'index']);
