<nav class="navbar navbar-expand-lg fixed-top bg-white">
    <div class="container">
        <a class="navbar-brand fw-bold text-info" href="{{ route('home') }}">Carsty Showroom</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('home') }}/#mobil">Mobil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('transaction') }}">Transaksi</a>
                </li>
                <li class="nav-item">
                    @if (auth()->check())
                <li class="nav-item dropdown-center">
                    <a class="nav-link fw-bold dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start dropdown-menu-md-end">
                        <li>
                            <a class="dropdown-item fw-bold" href="{{ route('logout') }}">
                                Logout <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
