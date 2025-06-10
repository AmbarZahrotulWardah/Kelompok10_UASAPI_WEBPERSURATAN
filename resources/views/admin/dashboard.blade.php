@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">

    <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    {{-- Daftar Surat Masuk --}}
    <div class="mb-10">
        <h3 class="text-xl font-semibold mb-4">Daftar Surat Masuk</h3>
        @forelse($daftarSurat as $surat)
            <div class="border p-4 mb-4 rounded shadow-sm bg-white">
                <p><strong>Dari:</strong> {{ $surat->user->name }}</p>
                <p><strong>Judul:</strong> {{ $surat->judul }}</p>
                <p><strong>Isi:</strong> {{ $surat->isi }}</p>

                {{-- Form komentar admin --}}
                <form method="POST" action="{{ route('admin.surat.update', $surat->id) }}" class="mt-3">
                    @csrf
                    @method('PUT')
                    <textarea name="pesan_admin" placeholder="Pesan untuk user..." class="border p-2 w-full rounded mb-2">{{ $surat->pesan_admin }}</textarea>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Kirim Pesan / Update
                    </button>
                </form>

                {{-- Tombol Hapus --}}
                <form method="POST" action="{{ route('admin.surat.destroy', $surat->id) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded"
                        onclick="return confirm('Yakin ingin menghapus surat ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-600">Belum ada surat masuk.</p>
        @endforelse
    </div>

    {{-- Daftar Pengguna --}}
    <div>
        <h3 class="text-xl font-semibold mb-4">Daftar Pengguna</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengguna as $user)
                        <tr>
                            <td class="border p-2">{{ $user->name }}</td>
                            <td class="border p-2">{{ $user->email }}</td>
                            <td class="border p-2">{{ $user->role ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center border p-2 text-gray-500">Tidak ada pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
