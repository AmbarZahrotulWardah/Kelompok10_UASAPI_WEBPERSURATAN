@extends('layouts.app')

@section('content')
@php
    $dashboardRoute = route('dashboard'); // default dashboard user biasa

    if (Auth::check() && Auth::user()->role === 'admin') {
        $dashboardRoute = route('admin.dashboard');
    }
@endphp

<div class="min-h-screen bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 py-16 px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6 text-center">📨 Daftar Surat Masuk</h1>

        @if ($surats->isEmpty())
            <div class="text-center text-gray-500">Belum ada surat masuk.</div>
        @else
            <div class="space-y-6">
                @foreach ($surats as $surat)
                    <div class="border border-gray-200 rounded-lg p-5 hover:shadow transition duration-300 bg-gray-50">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-xl font-semibold text-indigo-800">{{ $surat->judul }}</h2>
                                <p class="text-sm text-gray-600 mt-1">
                                    Dari: <span class="font-medium">{{ $surat->user->name }}</span> ({{ $surat->user->email }})
                                </p>
                                <p class="mt-2 text-gray-700 text-sm">{{ Str::limit($surat->isi, 120) }}</p>

                                @if ($surat->pesan_admin)
                                    <div class="mt-3 text-sm text-purple-800 bg-purple-100 p-3 rounded-lg border border-purple-200">
                                        💬 <strong>Pesan dari Admin:</strong><br>
                                        {{ $surat->pesan_admin }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-right">
                                @if ($surat->lampiran)
                                    <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" class="text-sm text-indigo-600 hover:underline">
                                        📎 Lihat Lampiran
                                    </a>
                                @endif
                                <a href="{{ route('surat-masuk.show', $surat->id) }}" class="block mt-2 text-sm text-indigo-600 hover:underline">
                                    ➤ Buka Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @auth
        <div class="mt-8 text-center">
            <a href="{{ $dashboardRoute }}" class="text-sm text-blue-500 hover:underline">
                ← Kembali ke Dashboard
            </a>
        </div>
        @endauth
    </div>
</div>
@endsection
