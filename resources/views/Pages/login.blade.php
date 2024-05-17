<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="logoWN.png" alt="Logo" class="logo">
        <h1 class="title">Pusat Pelayanan Masyarakat</h1>
        <div class="login-box">
            <h2>Login</h2>
            <form action="{{route('auth')}}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Email" id="email" autofocus required>
                @error ('email')
                <small> {{$message}} </small>
                @enderror
                <input type="password" name="password" placeholder="Password" id="password" required>
                @error ('password')
                <small> {{$message}} </small>
                @enderror
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('failed'))
    <script>
        Swal.fire('{{$message}}');
    </script>
    @endif
</body>

</html>