<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CoffeeShop;
use App\Models\CoffeeMenu;
use App\Models\MenuSweet;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'cities_count' => City::count(),
            'coffee_shops_count' => CoffeeShop::count(),
            'coffee_menus_count' => CoffeeMenu::count(),
            'menu_sweets_count' => MenuSweet::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}