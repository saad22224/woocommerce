<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
     protected $guarded = [];
     public function cart()
     {
         return $this->belongsTo(Cart::class);
     }
     public function product()
     {
         return $this->belongsTo(Product::class);
     }
}
