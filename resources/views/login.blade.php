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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('login')}}" method="post">
                @csrf
                <input type="text" value="{{old('nkkip')}}" name="nkkip" placeholder="NKK/NIP" id="nkkip" autofocus >
                <input type="password" name="password" placeholder="Password" id="password" >
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('nkkip').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>

</html>