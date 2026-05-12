<?php

use App\Http\Controllers\BlogsController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/blogs', [BlogsController::class, 'index'])
     ->name('blogs.index')
     ->middleware(AuthorizedMiddleware::class . ':showBlogs');

Route::get('/blogs/create', [BlogsController::class, 'create'])
     ->name('blogs.create')
     ->middleware(AuthorizedMiddleware::class . ':createBlogs');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])
     ->name('blogs.edit')
     ->middleware(AuthorizedMiddleware::class . ':updateBlogs');

Route::delete('blogs./blogs/delete/{id}', [BlogsController::class, 'delete'])
     ->name('blogs.delete')
     ->middleware(AuthorizedMiddleware::class . ':deleteBlogs');

Route::post('/blogs/store', [BlogsController::class, 'store'])
     ->name('blogs.store')
     ->middleware(AuthorizedMiddleware::class . ':createBlogs');

Route::put('/blogs/update', [BlogsController::class, 'update'])
     ->name('blogs.update')
     ->middleware(AuthorizedMiddleware::class . ':updateBlogs');
