@extends('layout.master')
@section('isi')
  <body class="starter-page-page">
  
  <main class="main">
  
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Daftar Akun</h1>
              <p class="mb-0">Silakan buat akun untuk dapat melaporkan dan memantau kondisi sampah di lingkungan sekitar Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->
  
    <!-- Register Form Section -->
    <section id="register-section" class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card p-4 shadow rounded">
              <form method="POST" action="{{ route('kirim') }}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Alamat Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Daftar</button>
                <div class="text-center mt-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Register Form Section -->
  
  </main>

@endsection