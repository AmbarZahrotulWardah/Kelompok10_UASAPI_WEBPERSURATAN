@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 py-16 px-6">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8 relative">

        {{-- QR Code di pojok kanan atas --}}
        <div class="absolute top-4 right-8 text-center">
            <img src="{{ route('qr-code.generate', $surat->id) }}" alt="QR Code Lampiran" width="200">
            <p class="text-xs text-center">QR Code Lampiran</p>
        </div>

        <h1 class="text-2xl font-bold text-indigo-700 mb-4">📄 Detail Surat Masuk</h1>

        <div class="mb-4">
            <h2 class="text-lg font-semibold">📌 Judul:</h2>
            <p class="text-gray-800">{{ $surat->judul }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold">📝 Isi Surat:</h2>
            <p class="text-gray-800 whitespace-pre-line">{{ $surat->isi }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold">👤 Pengirim:</h2>
            <p class="text-gray-600">{{ $surat->user->name }} ({{ $surat->user->email }})</p>
        </div>

        @if ($surat->lampiran)
            <div class="mb-4">
                <h2 class="text-lg font-semibold">📎 Lampiran:</h2>
                <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" class="text-indigo-600 hover:underline">
                    Lihat File Lampiran
                </a>
            </div>
        @endif

        {{-- Komentar Admin di bagian bawah --}}
        @if($surat->komentar_admin)
            <div class="mt-8 w-full bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-3 rounded shadow-md text-sm">
                <strong>Komentar Admin:</strong><br>
                {{ $surat->komentar_admin }}
            </div>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ route('surat-masuk.daftar') }}" class="text-indigo-600 hover:underline text-sm">← Kembali ke Daftar Surat</a>
        </div>

    </div>
</div>
@endsection
