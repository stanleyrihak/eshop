<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello {{$order->first_name}},</h1>
<p>Thank you for your order</p>

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
    {{--@foreach($products as $i => $product)
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
    @endforeach--}}
    </tbody>
</table>
</body>
</html>
