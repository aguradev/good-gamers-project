<!DOCTYPE html>
<html lang="en" data-theme="haloween">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- css login -->
    <link rel="stylesheet" href="{{ url('storage/css/login.css') }}">

</head>

<body>
    @yield('main-content')

    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <script src="{{ url('storage/js/login.js') }}"></script>
</body>
