<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSweet extends Model
{
    use HasFactory;

    protected $table = 'menu_sweet';
    protected $primaryKey = 'id_sweet';
    public $timestamps = false;

    protected $fillable = [
        'name_sweet', 
        'description_sweet', 
        'price_sweet', 
        'coffeeshop_sweet_bd'
    ];

    public function coffeeShop()
    {
        return $this->belongsTo(CoffeeShop::class, 'coffeeshop_sweet_bd', 'id_coffee_shop');
    }
}