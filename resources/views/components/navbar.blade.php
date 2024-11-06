<!-- Navbar -->
<nav>
    <div class="container-fluid p-0 bg-dark">
        <div class="container-fluid container-lg p-0">
            <hr class="my-0 d-lg-none">
            <div class="text-center display-6 fw-bold mb-2 d-lg-none text-white">LARAVEL TEST</div>
            <div class="" data-bs-theme="dark">
                <nav class="navbar navbar-expand-lg justify-content-center justify-content-lg-between p-0">

                    <button class="navbar-toggler m-3 w-100" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        Menu
                    </button>
                    <div class="collapse navbar-collapse justify-content-between align-item-center"
                        id="navbarNavDropdown">
                        <div class="text-white m-1 p-3">
                            <div class="text-center display-8 fw-bold mb-2">LARAVEL TEST</div>
                        </div>
                        <div class="d-flex ">
                            <ul class="navbar-nav text-uppercase ps-3">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} pe-3"
                                        aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('pegawai.*') ? 'active' : '' }} px-lg-3"
                                        href="{{ route('pegawai.index') }}">Pegawai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('departemen.*') ? 'active' : '' }} px-lg-3" href="{{ route('departemen.index') }}">Departemen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('pangkat.*') ? 'active' : '' }}  px-lg-3" href="{{ route('pangkat.index') }}">Jabatan</a>
                                </li>
                            </ul>
                            <form method="POST" action="{{ route('logout') }}" class="mx-4">
                                @csrf
                                <button type="submit" class="btn btn-warning">Keluar</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</nav>
