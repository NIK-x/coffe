<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeShop extends Model
{
    use HasFactory;

    protected $table = 'coffee_shop';
    protected $primaryKey = 'id_coffee_shop';
    public $timestamps = false;

    protected $fillable = [
        'name_coffee_shop', 
        'address_coffeeshop', 
        'city_coffeeshop_bd', 
        'phone_coffeeshop', 
        'opening_hours_coffeeshop'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_coffeeshop_bd', 'id_city');
    }

    public function coffeeMenus()
    {
        return $this->hasMany(CoffeeMenu::class, 'address_coffee_bd', 'id_coffee_shop');
    }

    public function menuSweets()
    {
        return $this->hasMany(MenuSweet::class, 'coffeeshop_sweet_bd', 'id_coffee_shop');
    }
}