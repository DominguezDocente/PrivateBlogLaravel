<?php

use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.index')
  ->middleware(AuthorizedMiddleware::class);
