<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSweet;
use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class MenuSweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menuSweets = MenuSweet::with('coffeeShop')->get();
        return view('admin.menu_sweets.index', compact('menuSweets'));
    }

    public function create()
    {
        $coffeeShops = CoffeeShop::all();
        return view('admin.menu_sweets.create', compact('coffeeShops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_sweet' => 'required|string|max:155',
            'description_sweet' => 'required|string',
            'price_sweet' => 'required|numeric|min:0',
            'coffeeshop_sweet_bd' => 'required|exists:coffee_shop,id_coffee_shop',
        ]);

        MenuSweet::create([
            'name_sweet' => $request->name_sweet,
            'description_sweet' => $request->description_sweet,
            'price_sweet' => $request->price_sweet,
            'coffeeshop_sweet_bd' => $request->coffeeshop_sweet_bd,
        ]);

        return redirect()->route('admin.menu-sweets.index')
            ->with('success', 'Десерт успешно создан.');
    }

    public function show(MenuSweet $menuSweet)
    {
        $menuSweet->load('coffeeShop');
        return view('admin.menu_sweets.show', compact('menuSweet'));
    }

    public function edit(MenuSweet $menuSweet)
    {
        $coffeeShops = CoffeeShop::all();
        return view('admin.menu_sweets.edit', compact('menuSweet', 'coffeeShops'));
    }

    public function update(Request $request, MenuSweet $menuSweet)
    {
        $request->validate([
            'name_sweet' => 'required|string|max:155',
            'description_sweet' => 'required|string',
            'price_sweet' => 'required|numeric|min:0',
            'coffeeshop_sweet_bd' => 'required|exists:coffee_shop,id_coffee_shop',
        ]);

        $menuSweet->update([
            'name_sweet' => $request->name_sweet,
            'description_sweet' => $request->description_sweet,
            'price_sweet' => $request->price_sweet,
            'coffeeshop_sweet_bd' => $request->coffeeshop_sweet_bd,
        ]);

        return redirect()->route('admin.menu-sweets.index')
            ->with('success', 'Десерт успешно обновлен.');
    }

    public function destroy(MenuSweet $menuSweet)
    {
        $menuSweet->delete();

        return redirect()->route('admin.menu-sweets.index')
            ->with('success', 'Десерт успешно удален.');
    }
}