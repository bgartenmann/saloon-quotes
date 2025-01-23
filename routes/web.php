<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomQuoteController;
use App\Http\Controllers\AuthorQuotesController;

Route::get('/', [RandomQuoteController::class, 'show']);
Route::get('/author/{author}', [AuthorQuotesController::class, 'show']);
