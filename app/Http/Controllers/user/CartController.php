<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\services\cartService;

class CartController extends Controller
{

    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function addToCart(Request $request)
    {

        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'يجب عليك تسجيل الدخول للإستمتاع بمميزات المتجر'], 401);
        }


        $this->cartService->addtocart($user, $validated['product_id'], $validated['quantity']);


        return response()->json([
            'message' => 'Product added to cart successfully',
        ], 200);
    }

    public function showCart(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'يرجي تسجيل الدخول اولا'], 401);
        }

        $data =  $this->cartService->showcart($user);

        // $cart = $user->cart;

        // if (!$cart) {
        //     return response()->json(['message' => 'Cart is empty'], 200);
        // }

        // $cartItems = $cart->items()->with('product')->get();

        return response()->json([
            'cart_items' => $data['cartItems'],
        ], 200);
    }

    public function removeFromCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
        ]);
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'يجب عليك تسجيل الدخول للإستمتاع بمميزات المتجر'], 401);
        }

        $this->cartService->deletefromcart($user, $validated['product_id']);

        return response()->json([
            'message' => 'Product removed from cart successfully',
        ], 200);
    }
}
