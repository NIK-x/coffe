<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MetaController;
use App\Http\Controllers\Api\CoffeeShopController;
use App\Http\Controllers\Api\StatsController;

// Метаданные БД
Route::get('/meta/tables', [MetaController::class, 'tables']);
Route::get('/meta/schema/{table}', [MetaController::class, 'schema']);

// Кофейни
Route::get('/coffee-shops/{id}', [CoffeeShopController::class, 'show']);
Route::get('/coffee-shops', [CoffeeShopController::class, 'index']);

// Статистика
Route::get('/stats/coffee-shops-by-city', [StatsController::class, 'coffeeShopsByCity']);
Route::get('/stats/average-price', [StatsController::class, 'averagePriceByCategory']);
Route::get('/stats/top-cities', [StatsController::class, 'topCitiesByCoffeeShops']);