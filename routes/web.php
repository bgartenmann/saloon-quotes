<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomQuoteController;
use App\Http\Controllers\AuthorQuotesController;
use App\Http\Controllers\FavoritesController;

Route::get('/', [RandomQuoteController::class, 'show']);
Route::get('/author/{author}', [AuthorQuotesController::class, 'show']);
Route::get('/author/{author}/quotes', [AuthorQuotesController::class, 'index']);
Route::post('/favorites', [FavoritesController::class, 'store']);
