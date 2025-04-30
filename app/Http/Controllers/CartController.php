<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $cart = json_decode($request->cookie('cart', '[]'), true);
        return response()->json($cart);
    }

    public function addToCart(Request $request)
    {
        $product = $request->input('product');
        $cart = json_decode($request->cookie('cart', '[]'), true);

        $existing = collect($cart)->firstWhere('id', $product['id']);

        if ($existing) {
            foreach ($cart as &$item) {
                if ($item['id'] === $product['id']) {
                    $item['quantity'] += 1;
                }
            }
        } else {
            $product['quantity'] = 1;
            $cart[] = $product;
        }

        return response()->json($cart)
            ->cookie('cart', json_encode($cart), 60 * 24 * 7); // 7 дней
    }

    public function updateCart(Request $request)
    {
        $cart = $request->input('cart', []);
        return response()->json($cart)
            ->cookie('cart', json_encode($cart), 60 * 24 * 7);
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = json_decode($request->cookie('cart', '[]'), true);
        $cart = array_filter($cart, fn($item) => $item['id'] != $id);
        return response()->json(array_values($cart))
            ->cookie('cart', json_encode(array_values($cart)), 60 * 24 * 7);
    }
}
