<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MobilController::class, 'indexPage'])->name('home');
Route::get("/login", [AuthController::class, "loginPage"])->name("login_page");
Route::get("/register", [AuthController::class, "registerPage"])->name("register_page");
Route::post("/register", [AuthController::class, "register"])->name("register");
Route::post("/login", [AuthController::class, "login"])->name("login");