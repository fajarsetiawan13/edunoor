<!DOCTYPE html>
<html lang="en" class="scroll-smooth h-full bg-gray-50" data-theme="corporate">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body>
    @include('layout.dashboard-header')

    @yield('section')

    @include('layout.dashboard-nav')

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        
    @if(Request::is('dashboard/articles*'))
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body-editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	@endif
</html>