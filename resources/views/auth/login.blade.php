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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = Session::get('Success'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif
        <!--<h1>Login</h1> -->
        <form method="POST" action="{{ route('login-proses') }}">
            @csrf

            <h1>WareHouse</h1>
            <hr>

            <div class="profile-picture">
                <img src="{{ asset('images/login.png') }}" alt="Login Image">
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                @error('username')
                    <small style="color: red;">{{ $message }}</small> <!-- Menampilkan pesan kesalahan username -->
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <small style="color: red;">{{ $message }}</small> <!-- Menampilkan pesan kesalahan password -->
                @enderror
            </div>
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="login-button">Login</button>
                <br>
</br>
                <a href="{{ route('guest') }}" class="guest-button">Guest</a>

            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('Success'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif


    @if ($message = Session::get('Gagal'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif
</body>
</html>
