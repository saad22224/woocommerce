<?php

namespace App\Models;
use App\Models\User;
use App\Models\Cart_Item;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $guarded = [];
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function items()
     {
         return $this->hasMany(Cart_Item::class);
     }
}
