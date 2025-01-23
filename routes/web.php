<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomQuoteController;

Route::get('/', [RandomQuoteController::class, 'show']);
