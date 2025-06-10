@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Kelola Surat Masuk</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border border-gray-300 shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Pengirim</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Isi</th>
                <th class="border px-4 py-2">Komentar Admin</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($surats as $surat)
            <tr class="bg-white border-t">
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $surat->user->name }}</td>
                <td class="border px-4 py-2">{{ $surat->judul }}</td>
                <td class="border px-4 py-2">{{ $surat->isi }}</td>
                <td class="border px-4 py-2">
                    <form action="{{ route('admin.surat.update', $surat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="komentar_admin" class="w-full p-1 border rounded" rows="2" placeholder="Masukkan komentar...">{{ $surat->komentar_admin }}</textarea>
                        <button type="submit" class="mt-1 px-2 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700 transition">
                            💾 Simpan
                        </button>
                    </form>
                </td>
                <td class="border px-4 py-2">
                    <form action="{{ route('admin.surat.destroy', $surat->id) }}" method="POST" onsubmit="return confirm('Yakin hapus surat ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600 transition">
                            🗑️ Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-gray-500 py-4">Belum ada surat masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
