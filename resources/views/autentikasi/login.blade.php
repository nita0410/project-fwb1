@extends('layout.master1')

@section('isi')
<style>
    body {
        background-color: #f4f6f9;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 60px;
    }

    .login-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .login-title {
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }

    .login-subtitle {
        font-size: 1.1rem;
        color: #555;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control {
        font-size: 1.1rem;
        padding: 0.75rem 1rem;
        border-radius: 8px;
    }

    .btn-login {
        background-color: #1d4ed8;
        color: white;
        font-size: 1.2rem;
        padding: 0.75rem;
        border-radius: 8px;
        width: 100%;
    }

    .btn-login:hover {
        background-color: #1e40af;
    }

    .alert {
        font-size: 1rem;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <h2 class="login-title">Masuk Akun</h2>
        <p class="login-subtitle">Silakan login untuk mengakses sistem dan mengelola data barang elektronik sesuai dengan hak akses Anda.</p>

        @if (session('error'))
            <div class="alert alert-danger text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('kirimdata') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-login">Masuk</button>
        </form>
    </div>
</div>
@endsection
