<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Aplikasi Manajemen Surat</title>
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
        .form-wrapper input {
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
            <h2>Masuk ke Akun Anda</h2>
            <p>Silakan login untuk melanjutkan</p>

            @if ($errors->any())
                <div style="color: red; margin-bottom: 1rem;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>Email</label>
                <input type="email" name="email" required autofocus value="{{ old('email') }}">

                <label>Password</label>
                <input type="password" name="password" required>

                <!-- Ingat Saya -->
                <div style="margin-bottom: 1rem; display: flex; justify-content: flex-end;">
                    <label style="font-size: 13px; display: flex; align-items: center; gap: 6px;">
                        <input type="checkbox" name="remember" style="width: 14px; height: 14px;">
                        Ingat saya
                    </label>
                </div>

                <!-- Tombol & Link -->
                <div style="margin-bottom: 1rem; display: flex; justify-content: space-between;">
                    <a href="{{ route('register') }}">Belum punya akun?</a>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Lupa password?</a>
                    @endif
                </div>

                <button type="submit">Masuk Sekarang</button>
            </form>
        </div>
    </div>

    <!-- Kolom Gambar -->
    <div class="image-column">
        <img src="{{ asset('img/login.svg') }}" alt="Ilustrasi Login">
    </div>
</div>

</body>
</html>
