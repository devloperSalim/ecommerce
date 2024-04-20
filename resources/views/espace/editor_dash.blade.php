
@php
use Illuminate\Support\Facades\Auth; // Corrected typo in "Illuminate"
$user = Auth::user();
$dashboardRoute = $user ? $user->getRedirectRoute() : 'dashboard.default'; // Assuming a default route if user is not authenticated
@endphp

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
