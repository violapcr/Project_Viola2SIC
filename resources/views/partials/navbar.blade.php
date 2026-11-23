<aside class="sidebar">
    <a href="{{ route('home') }}" class="logo">Maison<br>Jemta</a>

    <nav>
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('products') }}" class="{{ request()->routeIs('products*') ? 'active' : '' }}">Products</a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About us</a>
    </nav>

</aside>
