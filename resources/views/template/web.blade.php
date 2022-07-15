<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('template/style')

</head>

<body>
    <div class="content-wrapper">
        @include('template/sidebar')

        <main class="content-main @if (Route::current()->getName() == 'product') product-main @endif">
            @yield('main-content')
        </main>

        @yield('footer')

        @include('template/script')

    </div>

</body>

</html>
