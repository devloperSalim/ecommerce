<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (Route::has('login'))
    <div class="ml-auto"> <!-- Using "ml-auto" class to push these links to the right -->
        @auth

            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
        @else
            <a href="{{ route('login') }}" class="nav-link">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endif
        @endauth
    </div>
@endif
@php
    use \Illuminate\Support\Facades\Request;

    $categoiesId = Request::input('categories') ?? [];
@endphp

<div>
    <form method="GET">
        <div>
            <label for="">Name or Description</label>
            <input type="text" value="{{ Request::input('name') }}" name="name" id="name" placeholder="Name">
        </div>

        <h3>Categorie</h3>
        @dump(Request::input('categories'))
        <div>
            @foreach ($categories as $categorie )

            <div>
                <input type="checkbox" @checked(in_array($categorie->id , $categoiesId )) name="categories[]" value="{{ $categorie->id }}" id="">
                <label>{{ $categorie->name }}</label>
            </div>

            @endforeach
        </div>
            <h3>Price</h3>
        <div>
            <label for="">min</label>
        <input min="{{ $pricesOptions->minPrice}}" max="{{ $pricesOptions->maxPrice }}" type="number" value="{{ Request::input('min') }}" name="min" id="">
        </div>
        <div>
            <label for="">max</label>
            <input min="{{ $pricesOptions->minPrice}}" max="{{ $pricesOptions->maxPrice }}" type="number" name="max" value="{{ Request::input('max') }}" id="">
        </div>


        <div>
            <input type="submit" value="Filter">
            <a href="{{ route('home') }}" type="reset">Reset</a>
        </div>
    </form>
</div>

<div class="container">
    @foreach ($products as $product )
        <div class="d-inline">
            <h1>{{ $product->name }}</h1>
            <img src="{{ asset('storage/'.$product->image) }}" alt="">
            <p>{{ $product->description }}</p>
            <p><span>Quantity :{{ $product->quantity }}</span></p>
            <p><span>Price :{{ $product->price }}</span></p>
        </div>
    @endforeach
</body>
</html>


