<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeMenu extends Model
{
    use HasFactory;

    protected $table = 'coffee_menu';
    protected $primaryKey = 'id_coffee';

    protected $fillable = [
        'name_coffee', 
        'description_coffee', 
        'price_coffee', 
        'address_coffee_bd'
    ];

    public function coffeeShop()
    {
        return $this->belongsTo(CoffeeShop::class, 'address_coffee_bd', 'id_coffee_shop');
    }
}