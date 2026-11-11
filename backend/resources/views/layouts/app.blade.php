<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col shrink-0 h-screen sticky top-0">

            {{-- Judul Sidebar --}}
            <div class="p-5 text-xl font-bold tracking-wider border-b border-gray-800 uppercase">
                PANEL {{ auth()->user()->role }}
            </div>

            {{-- Menu Navigasi --}}
            <nav class="flex-1 overflow-y-auto p-2 space-y-1">

                {{-- Menu Admin --}}
                @if(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.user.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Kelola User
                    </a>

                    <a href="{{ route('admin.kategori.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Kelola Kategori
                    </a>

                    <a href="{{ route('admin.alat.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Kelola Alat
                    </a>

                    <a href="{{ route('admin.peminjaman.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Kelola Peminjaman
                    </a>

                    <a href="{{ route('admin.pengembalian.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Kelola Pengembalian
                    </a>

                    <a href="{{ route('admin.logaktivitas.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Kelola Log Aktivitas
                    </a>

                @endif

                {{-- Menu Petugas --}}
                @if(auth()->user()->role === 'petugas')

                    <a href="{{ route('petugas.peminjaman.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Persetujuan Peminjaman
                    </a>

                    <a href="{{ route('petugas.pengembalian.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Pemantauan Pengembalian
                    </a>

                    <a href="{{ route('petugas.laporan.index') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Cetak Laporan
                    </a>

                @endif

                {{-- Menu Peminjam --}}
                @if(auth()->user()->role === 'peminjam')

                    <a href="{{ route('peminjam.katalog') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Katalog Alat
                    </a>

                    <a href="{{ route('peminjam.riwayat') }}"
                       class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                        Riwayat Peminjaman
                    </a>

                @endif

            </nav>

            {{-- Informasi Pengguna di Paling Bawah --}}
            <div class="p-4 text-sm text-gray-400">
                Logged in as:
                <span class="text-white font-semibold">
                    {{ auth()->user()->name }}
                </span>
            </div>

            {{-- MENU PROFIL --}}
            <div class="p-4 border-t border-gray-800">

                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('profile.*') ? 'bg-gray-800 text-white font-medium' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                    <div class="flex items-center gap-3">

                        {{-- FOTO PROFIL --}}
                        @if (auth()->user()->foto_profile)

                            <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}"
                                 alt="Foto Profil"
                                 class="w-9 h-9 rounded-full object-cover border border-gray-600">

                        @else

                            <div class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center">
                                <span class="text-sm font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>

                        @endif

                        {{-- INFORMASI PROFIL --}}
                        <div>
                            <p class="text-sm font-semibold">
                                Profile Saya
                            </p>

                            <p class="text-xs text-gray-400">
                                Lihat dan edit profil
                            </p>
                        </div>

                    </div>

                </a>

            </div>

        </aside>

        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col min-w-0">

            {{-- Header --}}
            <header class="bg-white shadow-sm min-h-16 flex items-center justify-between px-6 py-3 gap-4">

                <div class="text-lg font-semibold text-gray-800">
                    @yield('header-title', 'Dashboard')
                </div>

                <div class="flex items-center gap-3">

                    <span class="hidden sm:inline text-sm text-gray-600">
                        {{ auth()->user()->name }}
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                            Logout
                        </button>
                    </form>

                </div>
            </header>

            {{-- Isi Halaman --}}
            <main class="flex-1 p-4 md:p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>