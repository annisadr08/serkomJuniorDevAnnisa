<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="margin-left: 4rem;">
            {{-- logo telkom di navbar --}}
            <img src="https://smb.telkomuniversity.ac.id/wp-content/uploads/2023/03/Logo-Utama-Telkom-University.png"
                alt="Logo" width="100" height="auto" class="d-inline-block align-text-center">
        </a>
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">

                {{-- menu pilihan beasiswa --}}
                <li class="nav-item">
                    <a class="nav-link navbartext {{ Route::currentRouteName() === 'beranda' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('beranda') }}">Pilihan Beasiswa</a>
                </li>

                {{-- menu daftar --}}
                <li class="nav-item">
                    <a class="nav-link navbartext {{ Route::currentRouteName() === 'daftar' ? 'active' : '' }}"
                        href="{{ route('daftar') }}">Daftar</a>
                </li>

                {{-- menu hasil --}}
                <li class="nav-item">
                    <a class="nav-link navbartext {{ Route::currentRouteName() === 'hasil' ? 'active' : '' }}"
                        href="{{ route('hasil') }}">Hasil</a>
                </li>

                {{-- menu grafik --}}
                <li class="nav-item">
                    <a class="nav-link navbartext {{ Route::currentRouteName() === 'grafik' ? 'active' : '' }}"
                        href="{{ route('grafik') }}">Grafik</a>
                </li>

            </ul>
        </div>
    </div>
    <hr>
</nav>
