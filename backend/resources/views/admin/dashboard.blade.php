@extends('layouts.app')

@section('title', 'Dashboard Admin - Sistem Peminjaman')
@section('header-title', 'Ringkasan Aktivitas Sistem')

@section('content')

    {{-- Selamat Datang --}}
    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg shadow-sm">
        Selamat datang,
        <strong class="font-semibold">
            {{ auth()->user()->name }}
        </strong>!

        Anda login sebagai hak akses
        <span class="uppercase font-bold text-emerald-900">
            {{ auth()->user()->role }}
        </span>.
    </div>

    {{-- Isi Dashboard --}}
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-2">
            Dashboard Admin
        </h2>

        <p class="text-gray-600">
            Selamat datang di panel administrasi Sistem Peminjaman.
            Silakan pilih menu di sebelah kiri untuk mengelola data sistem.
        </p>

    </div>

@endsection