<nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a class="navbar-brand" href="{{ route('home') }}">Perpustakaan</a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('books.index') }}" class="btn btn-outline-light btn-sm ms-2">Data Book</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-light btn-sm ms-2">Kategori</a>
                @else
                    <span class="text-light ms-2">[Mode Pengunjung] Hanya bisa lihat buku</span>
                @endif
            @endauth
        </div>

        <div>
            @auth
                <span class="text-light me-2">Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm ms-2">Register</a>
            @endauth
        </div>
    </div>
</nav>
