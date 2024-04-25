<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .product-card {
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-card img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .product-card .card-body {
            padding: 15px;
        }

        .product-card h2 {
            margin-bottom: 5px;
            font-size: 1rem;
        }

        .product-card p {
            margin-top: 5px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @php
    use \Illuminate\Support\Facades\Request;

    $categoiesId = Request::input('categories') ?? [];
   @endphp
   <h1 class="ml-5 pt-2">list produit</h1>
   <hr>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <form method="GET" class="h-100">
                        <div class="form-group">
                            <label for="name">Name or Description</label>
                            <input type="text" value="{{ Request::input('name') }}" name="name" id="name" placeholder="Name" class="form-control">
                        </div>

                        <h3>Categorie</h3>
                        @dump(Request::input('categories'))
                        <div>
                            @foreach ($categories as $categorie )
                                <div class="form-group">
                                    <input type="checkbox" @checked(in_array($categorie->id , $categoiesId )) name="categories[]" value="{{ $categorie->id }}" class="form-checkbox">
                                    <label>{{ $categorie->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <h3 class="mt-3">Price</h3>
                        <div class="form-group">
                            <label for="min">min</label>
                            <input min="{{ $pricesOptions->minPrice}}" max="{{ $pricesOptions->maxPrice }}" type="number" value="{{ Request::input('min') }}" name="min" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="max">max</label>
                            <input min="{{ $pricesOptions->minPrice}}" max="{{ $pricesOptions->maxPrice }}" type="number" name="max" value="{{ Request::input('max') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Filter" class="btn btn-primary">
                            <a href="{{ route('home') }}" type="reset" class="btn btn-dark">Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($products as $product )
                            <div class="col-md-4">
                                <div class="product-card">
                                    <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h2>{{ $product->name }}</h2>
                                        <p>{{ $product->description }}</p>
                                        <p><span>Quantity:</span> {{ $product->quantity }}</p>
                                        <p><span>Price:</span> {{ $product->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
