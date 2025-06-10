@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        background: linear-gradient(to right, #f5f7fa, #c3cfe2);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    nav.admin-navbar h5 {
        color: #6c5ce7;
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
    }
    nav.admin-navbar button {
        border: none;
        background: #6c5ce7;
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }
    nav.admin-navbar button:hover {
        background: #574fcf;
    }

    .container-admin {
        max-width: 800px;
        margin: 50px auto 100px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 40px 50px;
    }

    .header-admin {
        text-align: center;
        margin-bottom: 40px;
    }

    .header-admin h2 {
        font-size: 2.5rem;
        color: #6c5ce7;
        font-weight: 700;
    }

    .user-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .user-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0;
        border-bottom: 1px solid #eee;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .avatar-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #dcd6f7;
        color: #6c5ce7;
        font-weight: 700;
        font-size: 1.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 8px rgba(108, 92, 231, 0.3);
    }

    .user-details {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
    }

    .user-email {
        font-size: 0.9rem;
        color: #888;
        margin-top: 3px;
    }

    .user-meta {
        margin-top: 8px;
        font-size: 0.85rem;
        color: #666;
    }

    .badge {
        display: inline-block;
        background: #6c5ce7;
        color: white;
        padding: 3px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-right: 10px;
        user-select: none;
    }

    .badge.secondary {
        background: #b0aaff;
        color: #4b39c9;
    }

    .badge.info {
        background: #a1caf1;
        color: #0f4c81;
    }

    .badge.warning {
        background: #ffeaa7;
        color: #a78b00;
    }

    .actions {
        display: flex;
        gap: 12px;
    }

    .btn-action {
        background: #6c5ce7;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 8px 18px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 3px 10px rgba(108,92,231,0.3);
    }

    .btn-action.edit {
        background: #6c5ce7;
    }
    .btn-action.edit:hover {
        background: #574fcf;
    }

    .btn-action.delete {
        background: #ff6b6b;
    }
    .btn-action.delete:hover {
        background: #e04e4e;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #aaa;
    }

    .empty-state img {
        max-width: 180px;
        margin-bottom: 20px;
    }

</style>

<nav class="admin-navbar">
    <button onclick="window.history.back()" aria-label="Kembali">
        <i class="bi bi-arrow-left"></i>
    </button>
    <h5>Admin Panel</h5>
</nav>

<div class="container-admin">
    <div class="header-admin">
        <h2>Daftar Pengguna</h2>
    </div>

    @if($pengguna->isEmpty())
        <div class="empty-state">
            <img src="{{ asset('img/empty-users.svg') }}" alt="Kosong">
            <p>Belum ada pengguna yang terdaftar.</p>
        </div>
    @else
        <ul class="user-list">
            @foreach ($pengguna as $user)
                <li class="user-item">
                    <div class="user-info">
                        <div class="avatar-circle">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        <div class="user-details">
                            <div class="user-name">{{ $user->name }}</div>
                            <div class="user-email">{{ $user->email }}</div>
                            <div class="user-meta">
                                <span class="badge {{ $user->role == 'admin' ? '' : 'secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                                <span>Terdaftar: {{ $user->created_at->format('d M Y') }}</span>
                                @if ($user->status_kerja)
                                    <span class="badge info">{{ $user->status_kerja }}</span>
                                @endif
                                @if ($user->project)
                                    <span class="badge warning">{{ $user->project->nama }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="btn-action delete">Hapus</button>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<!-- Lottie Player -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@endsection
