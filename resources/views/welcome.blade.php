<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Arsip Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-700 via-indigo-700 to-purple-700 min-h-screen text-gray-900">

    <!-- Hero Section -->
    <section class="text-white py-16 px-6 text-center">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-10 md:space-y-0">
            <!-- Teks -->
            <div class="md:w-1/2 text-left space-y-4">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">Kelola Arsip & Surat<br><span class="text-indigo-300">Lebih Cerdas, Cepat, & Aman</span></h1>
                <p class="text-lg text-indigo-100">Solusi digital untuk mengelola surat masuk, keluar, dokumen penting, dan QR Code dokumen hanya dalam satu aplikasi.</p>
                <a href="{{ route('register') }}" class="inline-block mt-4 bg-white text-indigo-700 px-6 py-3 rounded-full font-semibold shadow hover:bg-indigo-100 transition">🚀 Mulai Sekarang</a>
            </div>

            <!-- Ilustrasi -->
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('img/undraw_spreadsheet_uj8z.svg') }}" 
                    alt="Ilustrasi Arsip" 
                    class="w-[300px] md:w-[400px] rounded-xl shadow-lg transition-transform hover:scale-105 duration-300">
            </div>
        </div>
    </section>

    <!-- Feature Section -->
    <section class="bg-gray-50 py-16 px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-10">Kenapa Pakai Aplikasi Ini?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <!-- Fitur 1 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition">
                <div class="text-4xl mb-2">🔒</div>
                <h3 class="text-xl font-bold mb-2">Aman & Terenkripsi</h3>
                <p class="text-gray-600">Data tersimpan dengan aman menggunakan standar enkripsi terbaik.</p>
            </div>

            <!-- Fitur 2 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition">
                <div class="text-4xl mb-2">⚡</div>
                <h3 class="text-xl font-bold mb-2">Cepat & Mudah</h3>
                <p class="text-gray-600">Antarmuka simpel dan responsif, cocok digunakan semua orang.</p>
            </div>

            <!-- Fitur 3 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition">
                <div class="text-4xl mb-2">📄</div>
                <h3 class="text-xl font-bold mb-2">QR Code Dokumen</h3>
                <p class="text-gray-600">Cetak dokumen dengan QR untuk validasi dan akses cepat.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-sm text-white py-4 bg-indigo-800 mt-10">
        © {{ date('Y') }} Manajemen Arsip Digital — All rights reserved.
    </footer>

</body>
</html>
