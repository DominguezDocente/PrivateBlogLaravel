<?php

use App\Http\Controllers\RolesController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/roles', [RolesController::class, 'index'])
     ->name('roles.index')
     ->middleware(AuthorizedMiddleware::class . ':showRoles');

Route::get('/roles/create', [RolesController::class, 'create'])
     ->name('roles.create')
     ->middleware(AuthorizedMiddleware::class . ':createRoles');

Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])
     ->name('roles.edit')
     ->middleware(AuthorizedMiddleware::class . ':updateRoles');


Route::post('/roles/store', [RolesController::class, 'store'])
     ->name('roles.store')
     ->middleware(AuthorizedMiddleware::class . ':createRoles');

Route::put('/roles/update', [RolesController::class, 'update'])
     ->name('roles.update')
     ->middleware(AuthorizedMiddleware::class . ':updateRoles');

Route::delete('/roles/delete/{id}', [RolesController::class, 'delete'])
     ->name('roles.delete')
     ->middleware(AuthorizedMiddleware::class . ':deleteRoles');
