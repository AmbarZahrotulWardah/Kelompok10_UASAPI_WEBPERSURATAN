<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Aplikasi Manajemen Surat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
            padding-left: 1.5cm;
            padding-right: 1.5cm;
            box-sizing: border-box;
        }
        .form-column, .image-column {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-wrapper {
            width: 100%;
            max-width: 480px;
        }
        .form-wrapper h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 0.25rem;
        }
        .form-wrapper p {
            font-size: 14px;
            color: #6B7280;
            margin-bottom: 1.5rem;
        }
        .form-wrapper input, .form-wrapper select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            font-size: 14px;
        }
        .form-wrapper button {
            width: 100%;
            padding: 10px;
            background-color: #4F46E5;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .form-wrapper button:hover {
            background-color: #4338CA;
        }
        .form-wrapper a {
            font-size: 14px;
            color: #4F46E5;
            text-decoration: none;
        }
        .image-column img {
            max-height: 90%;
            max-width: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Kolom Formulir -->
    <div class="form-column">
        <div class="form-wrapper">
            <h2>Daftar Akun Baru</h2>
            <p>Isi data di bawah untuk mendaftar</p>

            @if ($errors->any())
                <div style="color: red; margin-bottom: 1rem;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>Nama Lengkap</label>
                <input type="text" name="name" required autofocus value="{{ old('name') }}">

                <label>Email</label>
                <input type="email" name="email" required value="{{ old('email') }}">

                <label>Kode Pengguna</label>
                <input type="text" name="kode" required value="{{ old('kode') }}">

                <label>Role</label>
                <select name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>

                <label>Password</label>
                <input type="password" name="password" required>

                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>

                <div style="margin-bottom: 1rem;">
                    <a href="{{ route('login') }}">Sudah punya akun?</a>
                </div>

                <button type="submit">Daftar Sekarang</button>
            </form>
        </div>
    </div>

    <!-- Kolom Gambar -->
    <div class="image-column">
        <img src="{{ asset('img/sign-up-form.svg') }}" alt="Ilustrasi Register">
    </div>
</div>

</body>
</html>
