<?php

use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MobilController::class, 'indexPage'])->name('home');
