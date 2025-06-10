@extends('layouts.app')

@section('content')
<style>
    .profile-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(to right, #f5f7fa, #c3cfe2);
        padding: 20px;
    }

    .card {
        background: #fff;
        border-radius: 15px;
        padding: 60px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 700px;
        width: 100%;
        font-size: 20px;
    }

    .card img {
        max-width: 220px;
        margin-bottom: 30px;
    }

    .card p {
        margin: 15px 0;
        font-size: 20px;
        color: #333;
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
</style>
<div class="profile-wrapper">
    <div class="card">
        <a href="/dashboard" class="btn btn-secondary mb-4">Kembali</a>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="profile icon">
        <p><strong>{{ Auth::user()->name }}</strong></p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
        <a href="{{ route('profile.edit') }}" class="btn-primary mt-3">Edit Profil</a>
    </div>
</div>
@endsection