<?php

namespace App\services;

use App\repository\cartRepository;

class cartService
{
    private $cartRepository;
    public function __construct(cartRepository  $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }
    public function addtocart($user, $product, $quantity)
    {
        $data =   $this->cartRepository->addtocart($user, $product);


        $cart = $data['cart'];
        $cartItem = $data['cartItem'];

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product,
                'quantity'   => $quantity,
            ]);
        }
    }

    public function showcart($user)
    {
        $data =  $this->cartRepository->showcart($user);

        if (!$data['cart']) {
            return response()->json(['message' => 'Cart is empty'], 200);
        }

        return $data;
    }

    public function deletefromcart($user, $product) {
        $productexist = $user->cart->items()->where('product_id', $product)->first();

        if (!$productexist) {
            return response()->json(['message' => 'Product not found in cart'], 200);
        }
        $this->cartRepository->deletefromcart($user, $product);
    }
}
