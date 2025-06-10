@extends('layouts.app')

@section('content')
<style>
    .edit-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(to right, #f5f7fa, #c3cfe2);
        padding: 20px;
    }

    .edit-card {
        background: #fff;
        border-radius: 15px;
        padding: 60px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        width: 100%;
        font-size: 20px;
    }

    .edit-card h2 {
        margin-bottom: 30px;
        color: #333;
        font-size: 26px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #6c5ce7;
        color: #fff;
        padding: 15px 30px;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #5a4fcf;
    }

    .back-link {
        margin-bottom: 30px;
        display: inline-block;
        color: #6c5ce7;
        text-decoration: none;
        font-size: 18px;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>
<div class="edit-wrapper">
    <div class="edit-card">
        <a href="/profile" class="back-link">&larr; Kembali ke profil</a>
        <h2>Edit Profil</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password Baru (opsional)">
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru">
            </div>
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
