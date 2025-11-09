<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';
    protected $primaryKey = 'id_city';

    protected $fillable = ['name_city'];

    // Отключаем автоматическую проверку уникальности при создании
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Временно отключаем проверку уникальности
        });

        static::updating(function ($model) {
            // Временно отключаем проверку уникальности
        });
    }

    public function coffeeShops()
    {
        return $this->hasMany(CoffeeShop::class, 'city_coffeeshop_bd', 'id_city');
    }
}