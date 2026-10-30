<?php

use App\Http\Controllers\SectionsController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/sections' , [SectionsController::class, 'index'])
     ->name('sections.index')
     ->middleware(AuthorizedMiddleware::class . ':sections.show');

Route::get('/sections/create' , [SectionsController::class, 'create'])
     ->name('sections.create')
     ->middleware(AuthorizedMiddleware::class . ':sections.create');

Route::get('/sections/edit/{id}' , [SectionsController::class, 'edit'])
     ->name('sections.edit')
     ->middleware(AuthorizedMiddleware::class . ':sections.update');

Route::post('/sections/store' , [SectionsController::class, 'store'])
     ->name('sections.store')
     ->middleware(AuthorizedMiddleware::class . ':sections.create');

Route::put('/sections/update' , [SectionsController::class, 'update'])
     ->name('sections.update')
     ->middleware(AuthorizedMiddleware::class . ':sections.update');

Route::delete('/sections/delete/{id}' , [SectionsController::class, 'delete'])
     ->name('sections.delete')
     ->middleware(AuthorizedMiddleware::class . ':sections.delete');




?>
