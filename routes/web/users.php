<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UsersController::class, 'index'])
     ->name('users.index')
     ->middleware(AuthorizedMiddleware::class . ':users.show');

Route::get('/users/create', [UsersController::class, 'create'])
     ->name('users.create')
     ->middleware(AuthorizedMiddleware::class . ':users.create');

Route::get('/users/edit/{id}', [UsersController::class, 'edit'])
     ->name('users.edit')
     ->middleware(AuthorizedMiddleware::class . ':users.update');

Route::post('/users/store', [UsersController::class, 'store'])
     ->name('users.store')
     ->middleware(AuthorizedMiddleware::class . ':users.create');

Route::put('/users/update', [UsersController::class, 'update'])
     ->name('users.update')
     ->middleware(AuthorizedMiddleware::class . ':users.update');
