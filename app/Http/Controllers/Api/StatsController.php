<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function coffeeShopsByCity()
    {
        $stats = DB::table('coffee_shops')
            ->join('cities', 'coffee_shops.city_id', '=', 'cities.id')
            ->select('cities.name as city_name', DB::raw('COUNT(coffee_shops.id) as coffee_shops_count'))
            ->groupBy('cities.id', 'cities.name')
            ->orderBy('coffee_shops_count', 'desc')
            ->get();

        return response()->json($stats);
    }

    public function averagePriceByCategory()
    {
        $coffeeAvg = DB::table('coffee_menus')
            ->select(DB::raw('"coffee" as category'), DB::raw('AVG(price) as average_price'))
            ->first();

        $sweetsAvg = DB::table('menu_sweets')
            ->select(DB::raw('"sweets" as category'), DB::raw('AVG(price) as average_price'))
            ->first();

        return response()->json([
            'coffee' => $coffeeAvg,
            'sweets' => $sweetsAvg
        ]);
    }

    public function topCitiesByCoffeeShops(Request $request)
    {
        $limit = $request->get('limit', 5);

        $topCities = DB::table('cities')
            ->join('coffee_shops', 'cities.id', '=', 'coffee_shops.city_id')
            ->select('cities.name', DB::raw('COUNT(coffee_shops.id) as coffee_shops_count'))
            ->groupBy('cities.id', 'cities.name')
            ->orderBy('coffee_shops_count', 'desc')
            ->limit($limit)
            ->get();

        return response()->json($topCities);
    }
}