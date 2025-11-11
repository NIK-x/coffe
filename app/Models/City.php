<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';
    protected $primaryKey = 'id_city';
    public $timestamps = false;

    protected $fillable = ['name_city'];

    public function coffeeShops()
    {
        return $this->hasMany(CoffeeShop::class, 'city_coffeeshop_bd', 'id_city');
    }
}