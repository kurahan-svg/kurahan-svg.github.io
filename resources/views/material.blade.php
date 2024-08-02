<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Top Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h2>Material</h2></a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="d-flex" id="wrapper">
    <div class="bg-dark border-right" id="sidebar-wrapper" style="height: 100vh; overflow-y: auto;">
            <div class="list-group list-group-flush">
                <a class="nav-link list-group-item list-group-item-action bg-dark text-white" href="{{ route('material') }}">Material</a>
                <a href="{{ route('tambah-material') }}" class="list-group-item list-group-item-action bg-dark text-white">Tambah Material</a>
                <a href="{{ route('AlatBerat') }}" class="list-group-item list-group-item-action bg-dark text-white">Alat Berat</a>
                <a href="{{ route('Talatberat') }}" class="list-group-item list-group-item-action bg-dark text-white">Tambah Alat Berat</a>
                <a href="{{ route('alat') }}" class="list-group-item list-group-item-action bg-dark text-white">Alat Kontruksi Ringan</a>
                <a href="{{ route('Talat') }}" class="list-group-item list-group-item-action bg-dark text-white">Tambah Alat Kontruksi Ringan</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <!-- Content goes here -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
