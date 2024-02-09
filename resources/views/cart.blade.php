@extends('layouts.default')

@section('content')
    {{--    error--}}
    <div class="cart-error">{{session('errors')?->first('errorMessage')}}</div>
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->


    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">

                <form method="POST" action="{{ route('cart.remove-product') }}" id="delete_form">
                    @csrf
                </form>
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($products as $i => $product)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{asset($product->image_path)}}" alt="Image"
                                             class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{$product->name}}</h2>
                                    </td>
                                    <td>${{$product->price}}</td>
                                    <td>
                                        <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                             style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-black decrease" type="button">&minus;
                                                </button>
                                            </div>

                                            <input type="hidden"
                                                   name="products[{{ $i }}][product_id]" value="{{ $product->id }}"
                                                   form="update-cart">
                                            <input name="products[{{ $i }}][quantity]" value="{{ $product->quantity }}"
                                                   type="text"
                                                   class="form-control text-center quantity-amount"

                                                   form="update-cart"
                                                   placeholder=""
                                                   aria-label="Example text with button addon"
                                                   aria-describedby="button-addon1">

                                            <div class="input-group-append">
                                                <button class="btn btn-outline-black increase" type="button">&plus;
                                                </button>
                                            </div>
                                        </div>

                                    </td>
                                    <td>${{ $product->price * $product->quantity }}</td>
                                    <td>
                                        <div>
                                            <button class="btn btn-black btn-sm" type="submit" name="id"
                                                    value="{{$product->id}}" form="delete_form">X
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        Prazdny kocar
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <form id="update-cart" method="POST" action="{{ route('cart.update-cart') }}">
                                @csrf
                                <button class="btn btn-black btn-sm btn-block" type="submit">Update Cart</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form id="update-cart" method="POST" action="{{ route('cart.continue-shopping') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-black btn-sm btn-block">Continue Shopping
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-black">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{app(\App\Services\CartService::class)->getSubtotalPrice()}}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{app(\App\Services\CartService::class)->getSubtotalPrice()}}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('checkout')}}" class="btn btn-black btn-lg py-3 btn-block">
                                        Proceed To Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
