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
            height: 100vh;
            width: 200px;
            padding: 10px 0;
        }
        .topbar {
            background-color: #7EBCFF;
            color: #fff;
            padding: 10px;
        }

        .list-group-item:hover {
    background-color: #333; /* Warna yang diinginkan saat disorot */
        }
        .profile-picture img {
          width: 40px;
          height: 30px;
          object-fit: cover;
        }
        .profile-home img {
          width: 30px;
          height: 30px;
          object-fit: cover;
        }
        .profile-alatberat img {
          width: 50px;
          height: 50px;
          object-fit: cover;
        }
        .profile-alatberatT img {
          width: 50px;
          height: 45px;
          object-fit: cover;
        }
        .profile-perkakas img {
          width: 40px;
          height: 35px;
          object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <h2>Tambah Perkakas</h2>
        <form method="POST" action="{{ route('logout-proses') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar">
        <div class="list-group list-group-flush">
                <a href="{{ route('home') }}" class="profile-home list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/home.png') }}" alt="material">   Home</a>
                <a href="{{ route('proyek') }}" class="profile-picture list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/proyek.png') }}" alt="material">Proyek</a>
                <a href="{{ route('material') }}" class="profile-picture list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/material.png') }}" alt="material">   Material</a>
                <a href="{{ route('alat') }}" class="profile-alatberat list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/alatberat.png') }}" alt="material">Alat Berat</a>
                <a href="{{ route('perkakas') }}" class="profile-perkakas list-group-item list-group-item-action bg-dark text-white"><img src="{{ asset('images/perkakas.png') }}" alt="material">Perkakas</a>
            </div>

        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <!-- Content goes here -->
                <form method="POST" action="{{ route('addP') }}">
        @csrf
        <div class="form-group">
            <label for="nama_proyek">Nama Proyek</label>
            <select class="form-control" id="nama_proyek" name="nama_proyek" required>
            <option value="-"> </option>
            @foreach ($proyeks as $proyek)
            <option value="{{ $proyek->id_proyek }}">{{ $proyek->nama_proyek }}</option>
             @endforeach
            </select>
            </div>

            <input type="hidden" id="nama_proyek_hidden" name="nama_proyek_hidden"> <!-- Hidden input for project name -->

            <div class="form-group">
                <label for="id_proyek">ID Proyek</label>
                <input type="text" class="form-control" id="id_proyek" name="id_proyek" readonly>
            </div>

        <div class="form-group">
            <label for="material">Nama Perkakas</label>
            <input type="text" class="form-control" id="perkakas" name="perkakas" required>
        </div>
        <div class="form-group">
            <label for="jumlah_awal">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>
        <div class="form-group">
            <label for="jumlah_awal">Kondisi</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to update project ID based on selected project name
        $('#nama_proyek').on('change', function() {
            var selectedProject = $(this).val();
            var selectedProjectName = $('#nama_proyek option:selected').text();
            $('#id_proyek').val(selectedProject);
            $('#nama_proyek_hidden').val(selectedProjectName);
        });
    </script>
</html>
