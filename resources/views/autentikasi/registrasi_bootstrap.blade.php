<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }
        .bg-merah {
            background-color:rgb(39, 94, 213) !important;
        }
        .btn-merah {
            background-color:rgb(39, 94, 213);
            color: #fff;
        }
        .btn-merah:hover {
            background-color:rgb(39, 94, 213);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-merah text-white">
                <h3 class="mb-0">Form Registrasi</h3>
            </div>
            <div class="card-body">
                <main class="main">

                    <!-- Page Title -->
                    <div class="page-title">
                        <div class="heading">
                            <div class="container">
                                <div class="row d-flex justify-content-center text-center">
                                    <div class="col-lg-8">
                                        <h1>Daftar Akun</h1>
                                        <p class="mb-0">Silakan login untuk mengakses sistem dan mengelola data barang elektronik sesuai dengan hak akses Anda.</p>
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
                                        <form method="POST" action="{{ url('/kirim') }}">
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
                                            <button type="submit" class="btn btn-merah w-100">Daftar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- /Register Form Section -->

                </main>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
