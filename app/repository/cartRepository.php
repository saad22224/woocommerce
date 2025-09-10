<?php
namespace App\repository;


class cartRepository{
   public function addtocart($user , $product){
       $cart = $user->cart()->firstOrCreate();
       $cartitem = $cart->items()->where('product_id' , $product)->first();

       return [
           'cartItem' => $cartitem,
           'cart' => $cart
       ];
   }
}