<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Topbar Styling */
        .topbar {
            background-color: #7EBCFF;
            color: #fff;
            padding: 10px;
            position: fixed;
            width: 100%;
            z-index: 1000; /* Ensure topbar is above other content */
        }
        .topbar form {
            margin-left: auto;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #000;
            color: #fff;
            height: 100%;
            position: fixed;
            top: 40px; /* Adjust top position to avoid overlap with topbar */
            left: 0;
            width: 250px; /* Increased width for sidebar */
            padding-top: 20px;
            z-index: 99; /* Ensure sidebar is below topbar */
            transition: all 0.3s ease;
            overflow-y: auto; /* Enable vertical scrolling for sidebar content */
        }
        .sidebar .list-group-item-action {
            color: #fff;
            border-color: transparent;
            transition: background-color 0.3s;
        }
        .sidebar .list-group-item-action:hover {
            background-color: #333;
        }
        .sidebar .list-group-item {
            background-color: transparent;
            border: none;
            display: flex;
            align-items: center;
            padding: 10px;
        }
        .sidebar .list-group-item img {
            width: 30px;
            height: auto;
            margin-right: 10px;
        }

        /* Page Content Styling */
        .page-content {
            margin-top: 60px; /* Adjust top margin to avoid overlap with topbar */
            margin-left: 250px; /* Adjust left margin to accommodate sidebar */
            padding: 20px;
            /*background-color: #fff;*/ /* Background color for content */
            min-height: calc(100vh - 60px); /* Ensure content takes full height minus topbar height */
        }

        /* Button Styling */
        .btn {
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%; /* Full width on smaller screens */
                max-width: 250px; /* Max width for larger sidebar */
            }
            .sidebar .list-group-item {
                justify-content: flex-start; /* Align items to the start */
            }
            .sidebar .list-group-item img {
                display: initial; /* Show images on small screens */
            }
            .page-content {
                margin-left: 0; /* Adjust content margin when sidebar is full-width */
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <h2>Perkakas</h2>
        @if(session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div id="error-alert" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Button Menu -->
        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
            Menu
        </button>

        <!-- Form Pencarian -->
        <form class="ms-auto" action="{{ route('cari') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama proyek" required>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Tombol Logout -->
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
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <img src="{{ asset('images/home.png') }}" alt="Home"> Home
                </a>
                <a href="{{ route('proyek') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <img src="{{ asset('images/proyek.png') }}" alt="Proyek"> Proyek
                </a>
                <a href="{{ route('material') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <img src="{{ asset('images/material.png') }}" alt="Material"> Material
                </a>
                <a href="{{ route('alat') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <img src="{{ asset('images/alatberat.png') }}" alt="Alat Berat"> Alat Berat
                </a>
                <a href="{{ route('perkakas') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <img src="{{ asset('images/perkakas.png') }}" alt="Perkakas"> Perkakas
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Content goes here -->
            <table class="table table-striped">
        <thead>

            <tr>
                <th>ID Proyek</th>
                <th>Nama Proyek</th>
                <th>ID Perkakas</th>
                <th>Perkakas</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th><a href="{{ route('Tperkakas') }}" class="btn btn-primary">Tambah perkakas</a></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($Perkakas as $Perkakas)
                <tr>
                    <td>{{ $Perkakas->id_proyek }}</td>
                    <td>{{ $Perkakas->nama_proyek }}</td>
                    <td>{{ $Perkakas->id_perkakas }}</td>
                    <td>{{ $Perkakas->perkakas }}</td>
                    <td>{{ $Perkakas->jumlah }}</td>
                    <td>{{ $Perkakas->harga }}</td>
                    <td>{{ $Perkakas->kondisi }}</td>
                    <td>{{ $Perkakas->created_at }}</td>
                    <td>{{ $Perkakas->updated_at }}</td>
                    <td><a href="{{ route('Eperkakas', ['id_perkakas' => $Perkakas->id_perkakas]) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('Dperkakas', ['id_perkakas' => $Perkakas->id_perkakas]) }}" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-danger center">Download</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    window.setTimeout(function() {
        $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
        $("#error-alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);
</script>
</script>
</body>
</html>
