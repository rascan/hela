<?php

use Illuminate\Support\Facades\Route;
use Rascan\Hela\Http\Controllers\LogController;

Route::get('/hela/logs', [ LogController::class, 'index' ]);
