@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 py-10">
    <div class="max-w-6xl mx-auto px-4">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-8">
            <div class="text-center md:text-left flex-1">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Halo, {{ Auth::user()->name ?? 'Admin' }}! 👋
                </h2>
                <p class="text-gray-600 text-lg mt-2">
                    Selamat datang di panel admin. Kelola surat masuk dan pengguna dengan mudah.
                </p>
            </div>
            <div class="flex justify-center md:justify-end flex-1">
                <img src="{{ asset('img/admin.svg') }}" alt="Ilustrasi Admin" class="max-w-[180px] md:max-w-[220px]">
            </div>
        </div>

        {{-- Notifikasi --}}
        @if(session('success') || session('error'))
            <div class="mb-6 max-w-2xl mx-auto">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 text-center px-4 py-2 rounded-lg shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 text-red-800 text-center px-4 py-2 rounded-lg shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        @endif

        {{-- Panel Admin --}}
        <div class="bg-white shadow-xl rounded-3xl p-6 md:p-10">
            <h4 class="text-xl font-semibold text-indigo-600 flex items-center gap-2 mb-6">
                <span>🛠</span> Panel Admin
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Kelola Surat Masuk - yang pertama --}}
                <a href="{{ route('surat-masuk.index') }}" class="bg-indigo-50 hover:bg-indigo-100 transition rounded-2xl p-6 text-center shadow-sm">
                    <div class="text-4xl mb-2">📥</div>
                    <h6 class="text-lg font-medium text-gray-800">Kelola Surat Masuk</h6>
                    <p class="text-sm text-gray-600 mt-1">Lihat & kelola seluruh surat masuk.</p>
                </a>

                {{-- Manajemen Pengguna --}}
                <a href="{{ route('pengguna.index') }}" class="bg-indigo-50 hover:bg-indigo-100 transition rounded-2xl p-6 text-center shadow-sm">
                    <div class="text-4xl mb-2">👥</div>
                    <h6 class="text-lg font-medium text-gray-800">Manajemen Pengguna</h6>
                    <p class="text-sm text-gray-600 mt-1">Atur & kelola data pengguna sistem.</p>
                </a>

                {{-- Tambahan: Kelola Surat Masuk (admin/kelola-surat) --}}
                <a href="{{ url('/admin/kelola-surat') }}" class="bg-blue-50 hover:bg-blue-100 transition rounded-2xl p-6 text-center shadow-sm">
                    <div class="text-4xl mb-2">📑</div>
                    <h6 class="text-lg font-medium text-gray-800">Komentar Surat Masuk</h6>
                    <p class="text-sm text-gray-600 mt-1">Arahkan ke halaman komentar dan review surat.</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
