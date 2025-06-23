<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color:rgb(35, 42, 49);
        }

        .sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            left: 0;
            top: 0;
            background-color:rgb(9, 121, 232);
            padding-top: 60px;
            color: white;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color:rgb(9, 121, 232);
        }

        .content {
            margin-left: 220px;
            padding: 30px;
        }

        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .sidebar h4 {
            text-align: center;
            padding-top: 10px;
            color:rgb(9, 121, 232);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Manajer </a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-outline-light" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Menu</h4>
        <a href="{{ route('manajer.laporan.barang') }}">📦 Laporan Barang</a>
        <a href="{{ route('manajer.barang.masuk') }}">📥 Riwayat Barang Masuk</a>
        {{-- Tambahkan lebih banyak menu jika perlu --}}
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('isi')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
