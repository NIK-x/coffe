<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeMenu;
use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class CoffeeMenuController extends Controller
{
    public function index()
    {
        $coffeeMenus = CoffeeMenu::with('coffeeShop')->get();
        return view('admin.coffee_menus.index', compact('coffeeMenus'));
    }

    public function create()
    {
        $coffeeShops = CoffeeShop::all();
        return view('admin.coffee_menus.create', compact('coffeeShops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_coffee' => 'required|string|max:150', // Исправлено
            'description_coffee' => 'required|string', // Исправлено
            'price_coffee' => 'required|numeric|min:0', // Исправлено
            'address_coffee_bd' => 'required|exists:coffee_shop,id_coffee_shop', // Исправлено
        ]);

        CoffeeMenu::create([
            'name_coffee' => $request->name_coffee,
            'description_coffee' => $request->description_coffee,
            'price_coffee' => $request->price_coffee,
            'address_coffee_bd' => $request->address_coffee_bd,
        ]);

        return redirect()->route('admin.coffee-menus.index')
            ->with('success', 'Coffee menu item created successfully.');
    }

    public function show(CoffeeMenu $coffeeMenu)
    {
        $coffeeMenu->load('coffeeShop');
        return view('admin.coffee_menus.show', compact('coffeeMenu'));
    }

    public function edit(CoffeeMenu $coffeeMenu)
    {
        $coffeeShops = CoffeeShop::all();
        return view('admin.coffee_menus.edit', compact('coffeeMenu', 'coffeeShops'));
    }

    public function update(Request $request, CoffeeMenu $coffeeMenu)
    {
        $request->validate([
            'name_coffee' => 'required|string|max:150',
            'description_coffee' => 'required|string',
            'price_coffee' => 'required|numeric|min:0',
            'address_coffee_bd' => 'required|exists:coffee_shop,id_coffee_shop',
        ]);

        $coffeeMenu->update([
            'name_coffee' => $request->name_coffee,
            'description_coffee' => $request->description_coffee,
            'price_coffee' => $request->price_coffee,
            'address_coffee_bd' => $request->address_coffee_bd,
        ]);

        return redirect()->route('admin.coffee-menus.index')
            ->with('success', 'Coffee menu item updated successfully.');
    }

    public function destroy(CoffeeMenu $coffeeMenu)
    {
        $coffeeMenu->delete();

        return redirect()->route('admin.coffee-menus.index')
            ->with('success', 'Coffee menu item deleted successfully.');
    }
}