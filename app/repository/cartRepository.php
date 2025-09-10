<?php

namespace App\repository;


class cartRepository
{
    public function addtocart($user, $product)
    {
        $cart = $user->cart()->firstOrCreate();
        $cartitem = $cart->items()->where('product_id', $product)->first();

        return [
            'cartItem' => $cartitem,
            'cart' => $cart
        ];
    }

    public function showcart($user)
    {
        $cart = $user->cart;
        $cartItems = $cart->items()->with('product')->get();

        return [
            'cartItems' => $cartItems,
            'cart' => $cart
        ];
    }

    public function deletefromcart($user, $product)
    {
        $cart = $user->cart;
        $cart->items()->where('product_id', $product)->delete();
    }
}
