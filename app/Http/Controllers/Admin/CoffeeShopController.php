<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeShop;
use App\Models\City;
use Illuminate\Http\Request;

class CoffeeShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coffeeShops = CoffeeShop::with('city')->get();
        return view('admin.coffee_shops.index', compact('coffeeShops'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.coffee_shops.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_coffee_shop' => 'required|string|max:145',
            'address_coffeeshop' => 'required|string|max:255',
            'city_coffeeshop_bd' => 'required|exists:city,id_city',
            'phone_coffeeshop' => 'required|string|max:100',
            'opening_hours_coffeeshop' => 'required|string|max:100',
        ]);

        CoffeeShop::create([
            'name_coffee_shop' => $request->name_coffee_shop,
            'address_coffeeshop' => $request->address_coffeeshop,
            'city_coffeeshop_bd' => $request->city_coffeeshop_bd,
            'phone_coffeeshop' => $request->phone_coffeeshop,
            'opening_hours_coffeeshop' => $request->opening_hours_coffeeshop,
        ]);

        return redirect()->route('admin.coffee-shops.index')
            ->with('success', 'Кофейня успешно создана.');
    }

    public function show(CoffeeShop $coffeeShop)
    {
        $coffeeShop->load(['city', 'coffeeMenus', 'menuSweets']);
        return view('admin.coffee_shops.show', compact('coffeeShop'));
    }

    public function edit(CoffeeShop $coffeeShop)
    {
        $cities = City::all();
        return view('admin.coffee_shops.edit', compact('coffeeShop', 'cities'));
    }

    public function update(Request $request, CoffeeShop $coffeeShop)
    {
        $request->validate([
            'name_coffee_shop' => 'required|string|max:145',
            'address_coffeeshop' => 'required|string|max:255',
            'city_coffeeshop_bd' => 'required|exists:city,id_city',
            'phone_coffeeshop' => 'required|string|max:100',
            'opening_hours_coffeeshop' => 'required|string|max:100',
        ]);

        $coffeeShop->update([
            'name_coffee_shop' => $request->name_coffee_shop,
            'address_coffeeshop' => $request->address_coffeeshop,
            'city_coffeeshop_bd' => $request->city_coffeeshop_bd,
            'phone_coffeeshop' => $request->phone_coffeeshop,
            'opening_hours_coffeeshop' => $request->opening_hours_coffeeshop,
        ]);

        return redirect()->route('admin.coffee-shops.index')
            ->with('success', 'Кофейня успешно обновлена.');
    }

    public function destroy(CoffeeShop $coffeeShop)
    {
        $coffeeShop->delete();

        return redirect()->route('admin.coffee-shops.index')
            ->with('success', 'Кофейня успешно удалена.');
    }
}