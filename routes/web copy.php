<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

include('web/sections.php');
include('web/blogs.php');
