<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CoffeeShopController;
use App\Http\Controllers\Admin\CoffeeMenuController;
use App\Http\Controllers\Admin\MenuSweetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('cities', CityController::class)->names('admin.cities');
    Route::resource('coffee-shops', CoffeeShopController::class)->names('admin.coffee-shops');
    Route::resource('coffee-menus', CoffeeMenuController::class)->names('admin.coffee-menus');
    Route::resource('menu-sweets', MenuSweetController::class)->names('admin.menu-sweets');
});