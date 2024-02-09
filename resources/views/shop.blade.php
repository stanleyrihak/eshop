@extends('layouts.default')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->


    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                @foreach($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <div class="product-item" href="#">
                            <img src="{{asset($product->image_path)}}" class="img-fluid product-thumbnail shop_product_image">
                            <h3 class="product-title">{{$product->name}}</h3>
                            <strong class="product-price">${{$product->price}}</strong>

                            <a class="icon-cross" href="{{route('product.add-to-cart', ['product_id' => $product->id])}}">
								<img src="{{asset('storage/images/ux/cross.svg')}}" class="img-fluid" alt="">
							</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{--<div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-1.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-2.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Kruzo Aero Chair</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Ergonomic Chair</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 4 -->


                <!-- Start Column 1 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-1.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-2.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Kruzo Aero Chair</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="../storage/images/product-3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Ergonomic Chair</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
								<img src="../storage/images/cross.svg" class="img-fluid">
							</span>
                    </a>
                </div>
                <!-- End Column 4 -->

            </div>
        </div>
    </div>--}}
@endsection
