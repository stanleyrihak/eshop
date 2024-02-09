<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
<h1>ADMIN</h1>

@if(Session::has('fail'))
    <div class="failed_login">{{Session::get('fail')}}</div>
@endif
<form method="POST" action="{{ route('admin.store-product') }}" enctype="multipart/form-data">
    @csrf

    <!-- image -->
    <div>
        <label for="image"></label>
        <input type="file" id="image" name="image" value="{{ old('image') }}" required>
        @error('image')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- name -->
    <div>
        <label for="name"></label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- price -->
    <div>
        <label for="price"></label>
        <input type="number" step=".01" id="price" name="price" value="{{ old('price') }}" required>
        @error('price')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit -->
    <button type="submit">Submit</button>
</form>

@foreach($products as $product)
    <div><img src="{{asset($product->image_path)}}" alt=""></div>
    <div><span>{{$product->name}}</span></div>
    <div><span>{{}}</span></div>
@endforeach
</body>
</html>
