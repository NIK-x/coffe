<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class CoffeeShopController extends Controller
{
    public function show($id)
    {
        $coffeeShop = CoffeeShop::with(['city', 'coffeeMenus', 'menuSweets'])
            ->find($id);

        if (!$coffeeShop) {
            return response()->json(['error' => 'Coffee shop not found'], 404);
        }

        return response()->json([
            'id' => $coffeeShop->id,
            'name' => $coffeeShop->name,
            'address' => $coffeeShop->address,
            'phone' => $coffeeShop->phone,
            'opening_hours' => $coffeeShop->opening_hours,
            'city' => $coffeeShop->city,
            'coffee_menus' => $coffeeShop->coffeeMenus,
            'menu_sweets' => $coffeeShop->menuSweets,
        ]);
    }

    public function index(Request $request)
    {
        $query = CoffeeShop::with('city');

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if ($request->has('city_id') && $request->city_id) {
            $query->where('city_id', $request->city_id);
        }

        $perPage = $request->get('per_page', 10);
        $coffeeShops = $query->paginate($perPage);

        return response()->json([
            'data' => $coffeeShops->items(),
            'meta' => [
                'current_page' => $coffeeShops->currentPage(),
                'last_page' => $coffeeShops->lastPage(),
                'per_page' => $coffeeShops->perPage(),
                'total' => $coffeeShops->total(),
            ]
        ]);
    }
}