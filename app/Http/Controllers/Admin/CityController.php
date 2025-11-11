<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_city' => 'required|string|max:145',
        ]);

        City::create([
            'name_city' => $request->name_city
        ]);

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно создан.');
    }

    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name_city' => 'required|string|max:145',
        ]);

        $city->update([
            'name_city' => $request->name_city
        ]);

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно обновлен.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно удален.');
    }
}