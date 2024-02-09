<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function getCount(): int
    {
        $count = 0;

        $cart = session()->get('cart');

        if (!$cart || !is_array($cart)) {
            return 0;
        }

        foreach ($cart as $item) {
            $count += $item['quantity'] ?? 0;

        }

        return $count;
    }

    public function getCountById($id): int
    {
        $cart = session()->get('cart');

        if (!$cart || !is_array($cart) || !array_key_exists($id, $cart)) {
            return 0;
        }

        return $cart[$id]['quantity'];
    }

    public function getSubtotalPrice(): float
    {
        $cart = session()->get('cart', []);
        $price = 0;

        if (is_array($cart)) {
            foreach ($cart as $id => $item) {
                $productPrice = Product::find($id)->price;
                $productQuantity = $item['quantity'];

                $price += $productPrice * $productQuantity;
            }
        } else {
            \Log::warning("Cart is not array");
        }

        return $price;
    }
}
