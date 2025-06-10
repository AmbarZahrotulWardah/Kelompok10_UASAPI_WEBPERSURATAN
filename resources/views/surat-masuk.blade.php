<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Masuk | Persura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-indigo-50 min-h-screen text-gray-800">

    @php
        // Jika session 'is_admin' true → arahkan ke dashboard admin
        // Jika tidak, arahkan ke dashboard biasa (walau role = admin)
        $dashboardRoute = session('is_admin') === true
            ? route('admin.dashboard')
            : route('dashboard');
    @endphp



    <!-- Header -->
    <div class="bg-white shadow p-4 flex justify-between items-center sticky top-0 z-10">
        <h1 class="text-xl font-bold text-indigo-600">📥 Surat Masuk</h1>

        @auth
            <a href="{{ $dashboardRoute }}" class="text-sm bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                Dashboard
            </a>
        @endauth
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-xl p-6 mt-6 mx-auto max-w-xl w-full">
        <h2 class="text-xl font-semibold text-indigo-600 mb-4">✉️ Kirim Surat Masuk</h2>
        <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <label class="block mb-2 text-sm font-medium">Judul Surat</label>
            <input type="text" name="judul" required class="w-full border px-4 py-2 rounded mb-4">

            <!-- Isi -->
            <label class="block mb-2 text-sm font-medium">Isi Surat</label>
            <textarea name="isi" rows="4" required class="w-full border px-4 py-2 rounded mb-4"></textarea>

            <!-- Lampiran -->
            <label class="block mb-2 text-sm font-medium">Lampiran (opsional)</label>
            <input type="file" name="lampiran" class="w-full border px-2 py-1 rounded mb-4">

            <!-- Tombol -->
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Kirim
            </button>
        </form>
    </div>

</body>
</html>
