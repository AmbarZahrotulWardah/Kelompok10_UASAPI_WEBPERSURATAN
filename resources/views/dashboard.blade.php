@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Hero Section -->
<section id="hero" class="min-h-screen flex flex-col justify-center items-center text-center px-6" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 dark:text-white">
        Halo, {{ Auth::user()->name }}!
    </h2>
    <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-6 max-w-3xl">
        Selamat datang di sistem manajemen surat digital. Kirim, simpan, dan kelola surat masuk & keluar dengan mudah.
    </p>

    <!-- Lottie Animation -->
    <div class="flex justify-center mb-10">
        <lottie-player
            src="{{ asset('anim/dashboard.json') }}"
            background="transparent"
            speed="1"
            style="width: 360px; height: 360px;"
            loop autoplay>
        </lottie-player>
    </div>

    <a href="#tentang" class="px-8 py-3 bg-indigo-600 text-white rounded-full text-lg hover:bg-indigo-700 transition">
        Pelajari Lebih Lanjut
    </a>
</section>

<!-- Tentang Aplikasi -->
<section id="tentang" class="py-32 px-6" data-aos="fade-up">
    <div class="text-center max-w-5xl mx-auto">
        <h3 class="text-4xl md:text-5xl font-extrabold text-indigo-700 dark:text-indigo-300 leading-snug mb-10">
            Kami membangun Persura<br>
            <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                untuk kemudahan dan transparansi
            </span>
        </h3>

        <p class="text-xl md:text-2xl text-gray-800 dark:text-gray-300 leading-relaxed mb-6">
            Persura adalah sistem informasi manajemen surat berbasis web yang memudahkan pengelolaan surat masuk dan keluar secara digital.
        </p>
        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-400">
            Tujuan kami adalah menjadikan tata kelola surat yang efisien menjadi hal umum di lingkungan institusi Anda.
        </p>
    </div>
</section>

<!-- Spacer agar akses cepat muncul setelah scroll -->
<div class="h-32 md:h-48"></div>

<!-- Panel Akses Cepat -->
<section class="py-20 px-6 bg-white dark:bg-gray-900 rounded-t-3xl shadow-inner" data-aos="fade-up">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Akses Cepat</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">Navigasi ke fitur utama Anda</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-5xl mx-auto">
        <!-- Surat Masuk -->
        <a href="{{ route('surat-masuk.index') }}" class="block group">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-8 text-center hover:shadow-xl transition duration-300">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📥</div>
                <h3 class="text-2xl font-bold dark:text-white">Surat Masuk</h3>
                <p class="text-base text-gray-600 dark:text-gray-400 mt-2">Kirim dan lihat semua surat masuk dari pengguna lain.</p>
            </div>
        </a>

        <!-- Daftar Surat Masuk -->
        <a href="{{ route('surat-masuk.daftar') }}" class="block group">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-8 text-center hover:shadow-xl transition duration-300">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">✉️</div>
                <h3 class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">Daftar Surat Masuk</h3>
                <p class="text-base text-gray-600 dark:text-gray-400 mt-2">Lihat semua surat yang telah dikirim oleh semua pengguna.</p>
            </div>
        </a>
    </div>
</section>

<!-- Admin Section -->
@if (!session('is_admin'))
<section class="pt-32 pb-24 px-6" data-aos="fade-up">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-8 max-w-md mx-auto text-center">
        <h3 class="text-xl font-semibold mb-4 text-indigo-700 dark:text-indigo-300">🔐 Masuk sebagai Admin</h3>

        @if (session('kode_admin_error'))
            <div class="text-red-500 text-sm mb-2">{{ session('kode_admin_error') }}</div>
        @endif

        <form method="POST" action="{{ route('dashboard') }}">
            @csrf
            <input type="text" name="kode_admin" placeholder="Kode Admin"
                class="mt-2 border rounded px-4 py-2 w-full text-base dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button type="submit"
                class="mt-4 bg-indigo-600 text-white w-full py-2 rounded text-base hover:bg-indigo-700 transition">
                Masuk Admin
            </button>
        </form>
    </div>
</section>
@endif

@endsection
