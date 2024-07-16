@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  
@stop

@section('content')
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Si usas Tailwind o Bootstrap -->
</head>
<body>
    <nav>
        <ul>
            @foreach($menu as $item)
                <li>
                    <a href="{{ url($item['url']) }}">
                        <i class="{{ $item['icon'] }}"></i> {{ $item['text'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</body>
</html>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop