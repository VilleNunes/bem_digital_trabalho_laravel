<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .image-fundo{
            background-image: url("{{asset('login-background.svg')}}");
            background-size: cover;
        }
    </style>
</head>
<body class="image-fundo">
    @yield('content')
</body>
</html>