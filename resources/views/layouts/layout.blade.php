<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>髒話系統</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link href = "/css/bootstrap.min.css" rel = "stylesheet">
    @section('sidebar')

    @show
</head>
<body>
@include('menu')

@yield('content')
<script src = "/js/jquery.js"></script>
<script src = "/js/bootstrap.min.js"></script>
</body>
</html>