<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     // use HasFactory;

     protected $guarded = [];

     protected static function factory()
     {
          return ProductFactory::new();
     }

     public function cartItems()
     {
          return $this->hasMany(Cart_Item::class);
     }
}
