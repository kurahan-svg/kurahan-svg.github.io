<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            background-color: #000;
            color: #fff;
            min-height: 100vh;
        }
        .topbar {
            background-color: #7EBCFF;
            color: #fff;
            padding: 10px;
        }
        .list-group-item:hover {
            background-color: #333;
        }
        .profile-picture img, .profile-home img, .profile-alatberat img, .profile-alatberatT img, .profile-perkakas img {
            object-fit: cover;
        }
        .profile-picture img { width: 40px; height: 30px; }
        .profile-home img { width: 30px; height: 30px; }
        .profile-alatberat img, .profile-alatberatT img { width: 50px; height: 50px; }
        .profile-perkakas img { width: 40px; height: 35px; }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <h2>Dashboard</h2>
        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
            Menu
        </button>
        <form method="POST" action="{{ route('logout-proses') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <!-- Sidebar and Content -->
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar collapse d-md-block" id="sidebar">
            <div class="list-group list-group-flush">
                <a href="{{ route('home') }}" class="profile-home list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/home.png') }}" alt="Home"> Home</a>
                <a href="{{ route('proyek') }}" class="profile-picture list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/proyek.png') }}" alt="Proyek"> Proyek</a>
                <a href="{{ route('material') }}" class="profile-picture list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/material.png') }}" alt="Material"> Material</a>
                <a href="{{ route('alat') }}" class="profile-alatberat list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/alatberat.png') }}" alt="Alat Berat"> Alat Berat</a>
                <a href="{{ route('perkakas') }}" class="profile-perkakas list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/perkakas.png') }}" alt="Perkakas"> Perkakas</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/home.png') }}" class="card-img-top" alt="Home">
                        <div class="card-body">
                            <h5 class="card-title">Home</h5>
                            <p class="card-text">Dashboard dari website</p>
                            <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/proyeks.png') }}" class="card-img-top" alt="Proyek">
                        <div class="card-body">
                            <h5 class="card-title">Proyek</h5>
                            <p class="card-text">Tambah, edit, delete, read tabel proyek.</p>
                            <a href="{{ route('proyek') }}" class="btn btn-primary">Go to Proyek</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/material.png') }}" class="card-img-top" alt="Material">
                        <div class="card-body">
                            <h5 class="card-title">Material</h5>
                            <p class="card-text">Tambah, edit, delete, read tabel material</p>
                            <a href="{{ route('material') }}" class="btn btn-primary">Go to Material</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/alatberats.png') }}" class="card-img-top" alt="Alat Berat">
                        <div class="card-body">
                            <h5 class="card-title">Alat Berat</h5>
                            <p class="card-text">Tambah, edit, delete, read tabel alat berat</p>
                            <a href="{{ route('alat') }}" class="btn btn-primary">Go to Alat Berat</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/perkakass.png') }}" class="card-img-top" alt="Perkakas">
                        <div class="card-body">
                            <h5 class="card-title">Perkakas</h5>
                            <p class="card-text">Tambah, edit, delete, read tabel perkakas</p>
                            <a href="{{ route('perkakas') }}" class="btn btn-primary">Go to Perkakas</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/download.png') }}" class="card-img-top" alt="Download">
                        <div class="card-body">
                            <h5 class="card-title">Download</h5>
                            <p class="card-text">Buka menggunakan fitur import data from Text/CSV di Ms.Excel</p>
                            <a href="{{ route('download-all') }}" class="btn btn-danger">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
