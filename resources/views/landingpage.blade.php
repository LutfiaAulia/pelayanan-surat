<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Surat</title>

    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('template/assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>

<body>
    {{-- Landing Page --}}
    <div class="landing-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h1>Selamat Datang di Pelayanan Surat Kantor Wali Nagari Pungguang Kasiak</h1>
                    <p>Silakan masuk untuk melanjutkan.</p>
                    <a class="btn btn-primary" href="{{ route('login') }}" role="button">Masuk</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('template/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
