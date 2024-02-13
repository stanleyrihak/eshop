<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart');
        $products = [];

        if ($cart != []) {
            foreach ($cart as $productId => $item) {
                $product = \App\Models\Product::find($productId);

                $product->quantity = $item['quantity'];

                if (!$product) continue;

                $products[] = $product;
            }
        }

        return view('cart', ['products' => $products]);
    }

    public function updateCart(Request $request)
    {
        $data = $request->input('products', []);

        $newCart = [];

        foreach ($data as $item) {
            $newCart[$item['product_id']] = ['quantity' => $item['quantity']];
        }

        session()->put('cart', $newCart);

        return back();
    }

    public function removeProduct(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
        }
        session()->put('cart', $cart);

        return back();
    }

    public function continueShopping()
    {
        return redirect(route('shop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
