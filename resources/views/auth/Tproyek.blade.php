<!DOCTYPE html>
<html lang="en">
<head>
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
    overflow-x: hidden; /* Prevent horizontal scroll */
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
    position: fixed;
    top: 60px; /* Adjust top position to avoid overlap with topbar */
    left: 0;
    width: 250px; /* Fixed width for sidebar */
    padding-top: 20px;
    z-index: 99; /* Ensure sidebar is below topbar */
    transition: all 0.3s ease;
    overflow-y: auto; /* Enable vertical scrolling for sidebar content */
    height: calc(100vh - 60px); /* Adjust height to fill remaining viewport */
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
    
    min-height: calc(100vh - 60px); /* Ensure content takes full height minus topbar height */
}

/* Button Styling */
.btn {
    cursor: pointer;
}

/* Responsive Styles */
@media (max-width: 991.98px) {
    .topbar {
        padding: 5px; /* Reduce padding on smaller screens */
    }

    .topbar h2 {
        font-size: 18px; /* Adjust font size for heading */
    }

    .topbar form {
        margin-right: 10px; /* Add margin to the right for logout button */
    }

    .sidebar {
        width: 100%; /* Full width on smaller screens */
        max-width: 250px; /* Max width for larger sidebar */
        top: 40px; /* Adjust top position to touch bottom of topbar */
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
        <h2>Proyek</h2>
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

        <!-- Button Menu (for small screens) -->
        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
            Menu
        </button>

        <!-- Form Pencarian -->
        

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
            <form method="POST" action="{{ route('addProyek') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_proyek">Nama Proyek</label>
                    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" required>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
