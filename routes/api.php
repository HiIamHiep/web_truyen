<?php

use App\Http\Controllers\ComicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/comics',[ComicController::class, 'index'])->name('comics.index');
