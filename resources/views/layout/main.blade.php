<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="corporate">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('layout.main-header')

    @yield('section')

    @include('layout.main-footer')

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</body>
</html>