<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>

<html>

<body class="text-white " style="background-color: #363636 !important;">
    @yield('content')
</body>

<footer class='center' width='100%'>
    <div class="container">
        <div class="text-center">CIRE - 2021</div>
    </div>
</footer>

</html>
