@extends('layouts.app')

@section('title', 'Profil Pengguna')
@section('header-title', 'Profil Saya')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- NOTIFIKASI BERHASIL --}}
    @if(session('success'))
        <div class="mb-5 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- NOTIFIKASI ERROR --}}
    @if($errors->any())
        <div class="mb-5 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-300 overflow-hidden">

        {{-- HEADER HITAM --}}
        <div class="bg-gray-900 p-6 text-white">
            <h2 class="text-xl font-bold">Pengaturan Profil</h2>
            <p class="text-sm text-gray-300 mt-1">
                Kelola informasi dan foto profil akun kamu.
            </p>
        </div>

        <form action="{{ route('profile.update') }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6">

            @csrf
            @method('PUT')

            {{-- FOTO PROFIL --}}
            <div class="mb-8 flex flex-col items-center">

                @php
                    $fotoProfil = null;

                    if ($user->foto_profile) {
                        if (str_starts_with($user->foto_profile, 'profile/')) {
                            $fotoProfil = asset($user->foto_profile);
                        } else {
                            $fotoProfil = asset('storage/' . $user->foto_profile);
                        }
                    }
                @endphp

                @if($fotoProfil)

                    <img
                        src="{{ $fotoProfil }}"
                        alt="Foto Profil"
                        class="w-32 h-32 rounded-full object-cover border-4 border-gray-300 shadow-sm"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    >

                    <div
                        class="w-32 h-32 rounded-full bg-gray-200 items-center justify-center border-4 border-gray-300"
                        style="display:none;"
                    >
                        <span class="text-4xl font-bold text-gray-600">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>

                @else

                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center border-4 border-gray-300">
                        <span class="text-4xl font-bold text-gray-600">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>

                @endif

                <h3 class="mt-3 text-lg font-bold text-gray-800">
                    {{ $user->name }}
                </h3>

                <span class="mt-1 px-3 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-800 uppercase">
                    {{ $user->role }}
                </span>

                {{-- INPUT FOTO --}}
                <div class="mt-4 w-full max-w-sm">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Ganti Foto Profil
                    </label>

                    <input
                        type="file"
                        name="foto_profile"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full text-sm border border-gray-300 rounded-lg p-2"
                    >

                    <p class="text-xs text-gray-500 mt-1">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>

                    @error('foto_profile')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

            <hr class="mb-6 border-gray-300">

            {{-- NAMA LENGKAP --}}
            <div class="mb-5">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-700"
                >

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- EMAIL --}}
            <div class="mb-5">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-700"
                >

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- NOMOR HP --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp', $user->no_hp) }}"
                    placeholder="Masukkan nomor HP"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-700"
                >

                @error('no_hp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- TOMBOL --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 border-t border-gray-300 pt-5">

                <a
                    href="{{ url()->previous() }}"
                    class="px-5 py-3 text-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="px-5 py-3 bg-gray-900 hover:bg-black text-white font-semibold rounded-lg transition"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection