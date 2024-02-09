<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/shop', function () {
//    dd(\App\Models\Product::all());
    return view('shop', ['products' => \App\Models\Product::all()]);
})->name('shop');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank-you');

Route::get('/product/{product_id}/add-to-cart', function (Request $request, $id) {
    $cart = session()->get('cart');

    if (!is_array($cart)) {
        $cart = [];
    }

    if (array_key_exists($id, $cart)) {
        $cart[$id]['quantity'] += 1;
    } else {
        $cart[$id] = ['quantity' => 1];
    }

    session()->put('cart', $cart);


    return back();
})->name('product.add-to-cart');

Route::get('/checkout', function () {



    $cart = session()->get('cart', []);

    if(empty($cart)){
        return redirect(\route('cart.index'))->withErrors(['errorMessage' => 'Your kočar is empty']);
    }

    $items = [];

    foreach ($cart as $id => $cartItem) {
        $product = \App\Models\Product::find($id);

        $item = new \stdClass();
        $item->name = $product->name;
        $item->price = $product->price;
        $item->quantity = $cartItem['quantity'];

        $items[] = $item;
    }

    return view('checkout', ['items' => $items]);
})->name('checkout');
Route::post('/checkout', function (Request $request) {
    dd($request->all());
})->name('checkout.store');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update-cart');
Route::post('/cart/remove', [\App\Http\Controllers\CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::post('/cart/continue', [\App\Http\Controllers\CartController::class, 'continueShopping'])->name('cart.continue-shopping');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login.create');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');
Route::post('/', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'storeProduct'])->name('admin.store-product');
