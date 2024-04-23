@php
use Illuminate\Support\Facades\Auth; // Corrected typo in "Illuminate"
use Illuminate\Support\Facades\Route;
$user = Auth::user();
$dashboardRoute = $user ? $user->getRedirectRoute() : 'dashboard.default'; // Assuming a default route if user is not authenticated

$currebtRouteName = Route::currentRouteName();
dump(Route::is('products*'))
@endphp

<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="navbar-nav">


        <a class="nav-item nav-link" href="{{ route('products.index') }}">Product</a>
        <a class="nav-item nav-link" href="{{ route('categories.index') }}">Categories</a>
        <a class="nav-item nav-link" href="{{ route('products.create') }}">create product</a>

        @if (Route::has('login'))
            <div class="ml-auto"> <!-- Using "ml-auto" class to push these links to the right -->
                @auth
                    <a href="{{ route($dashboardRoute) }}" class="nav-link">Dashboard</a>
                    <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>
