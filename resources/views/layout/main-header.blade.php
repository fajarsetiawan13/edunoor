{{-- HEADER START --}}
<header>
    <div class="relative overflow-hidden bg-no-repeat bg-cover" style="background-position: 50%; background-image: url('{{ asset('/img/web-banner.jpg') }}'); height: 120px;">
        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.1)">
            <div class="flex justify-center items-center h-full">
                <div class="text-slate-800 px-6 md:px-12">
                    <h1 class="text-3xl font-bold md:text-center">SIDIKA</h1>
                    <p>Sistem Informasi Data Kesehatan Sekolah</p>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar bg-slate-50 z-30 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-slate-50 rounded-box w-52">
                    <li><a href="{{ Request::is('/*') ? '#' : '/'}}">Beranda</a></li>
                    <li><a href="{{ Request::is('articles') ? '#' : '/articles'}}">Artikel</a></li>
                    <li><a href="{{ Request::is('statistics') ? '#' : '/statistics'}}">Statistik</a></li>
                    <li><a href="{{ Request::is('about') ? '#' : '/about'}}">Tentang</a></li>
                </ul>
            </div>
            {{-- <a class="btn btn-sm btn-ghost normal-case text-sm md:btn-md md:text-md">EDUNOOR</a> --}}
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                <li><a href="{{ Request::is('/*') ? '#' : '/'}}">Beranda</a></li>
                <li><a href="{{ Request::is('articles') ? '#' : '/articles'}}">Artikel</a></li>
                <li><a href="{{ Request::is('statistics') ? '#' : '/statistics'}}">Statistik</a></li>
                <li><a href="{{ Request::is('about') ? '#' : '/about'}}">Tentang</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            @guest
            <label
                class="btn btn-sm text-sm lg:btn-md lg:text-md text-white bg-primary border-0 modal-button mr-3 px-5"
                for="login-modal">Masuk</label>
            @endguest
            @auth
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class="btn btn-sm text-sm lg:btn-md lg:text-md text-white bg-error border-0 modal-button mr-3 px-5"
                    onclick="return confirm('Anda ingin keluar?')">Keluar</button>
            </form>
            @endauth
        </div>
    </div>
</header>
{{-- HEADER END --}}