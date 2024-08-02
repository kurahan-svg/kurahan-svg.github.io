<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="login-container">
        <!--<h1>Login</h1> -->
        <div class="profile-picture">
                <img src="{{ asset('images/login.png') }}" alt="Login Image">
        <form method="POST" action="{{ route('login-proses') }}">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            @error('username')
            <small>{{ $message }}</small>
            @enderror
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            @error('password')
            <small>{{ $message }}</small>
            @enderror
            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<li class="nav-item">
                <a class="nav-link text-white" href="{{ route('material') }}">Material</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('tambah-alat-berat') }}">Tambah Alat Berat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('alat-berat') }}">Alat Berat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('tambah-alat-kontruksi-ringan') }}">Tambah Alat Kontruksi Ringan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('alat-kontruksi-ringan') }}">Alat Kontruksi Ringan</a>
