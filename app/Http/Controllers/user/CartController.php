<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $cart =   $user->cart()->FirstOrcreate([
            'user_id' => $user->id
        ]);

        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);


        $cartItem = $cart->items()->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity,
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart successfully',
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ], 200);
    }

    public function showCart(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'يرجي تسجيل الدخول اولا'], 401);
        }

        $cart = $user->cart;

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 200);
        }

        $cartItems = $cart->items()->with('product')->get();

        return response()->json([
            'cart_items' => $cartItems,
        ], 200);
    }
}
