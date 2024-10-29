<?php

use App\Http\Controllers\BlogsController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/blogs', [BlogsController::class, 'index'])
     ->name('blogs.index')
     ->middleware(AuthorizedMiddleware::class . ':Roles.showRoles');

Route::get('/blogs/create', [BlogsController::class, 'create'])
     ->name('blogs.create')
     ->middleware(AuthorizedMiddleware::class . ':Roles.createRoles');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])
     ->name('blogs.edit')
     ->middleware(AuthorizedMiddleware::class . ':Roles.updateRoles');

Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete'])
     ->name('blogs.delete')
     ->middleware(AuthorizedMiddleware::class . ':Roles.deleteRoles');

Route::post('/blogs/store', [BlogsController::class, 'store'])
     ->name('blogs.store')
     ->middleware(AuthorizedMiddleware::class . ':Roles.createRoles');

Route::put('/blogs/update', [BlogsController::class, 'update'])
     ->name('blogs.update')
     ->middleware(AuthorizedMiddleware::class . ':Roles.updateRoles');

