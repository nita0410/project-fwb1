@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Dashboard Admin</h4>
                </div>

                <div class="card-body">
                    <p class="mb-4">
                        Selamat datang di Halaman Admin
                        Silakan pilih menu di bawah untuk mengelola data.
                    </p>

                    <div class="list-group">
                        <a href="{{ route('admin.barang') }}" class="list-group-item list-group-item-action">
                            📦 Kelola Data Barang
                        </a>
                        <a href="{{ route('admin.pengguna') }}" class="list-group-item list-group-item-action">
                            👤 Kelola Pengguna
                        </a>
                        <a href="{{ route('admin.kategori') }}" class="list-group-item list-group-item-action">
                            🗂️ Kelola Kategori
                        </a>
                        <a href="{{ route('admin.barang.masuk') }}" class="list-group-item list-group-item-action">
                            ➕ Input Barang Masuk
                        </a>
                        <a href="{{ route('admin.barang.keluar') }}" class="list-group-item list-group-item-action">
                            ➖ Input Barang Keluar
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
