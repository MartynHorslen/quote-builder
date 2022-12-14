<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quote Builder</title>

        <!-- Bootstrap 5 CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Hamburger Spinner -->
        @vite('resources/css/hamburgers.css') 

        <!-- FontAwesome Icons -->
        <script src="https://kit.fontawesome.com/f0067c17da.js" crossorigin="anonymous"></script>

        <!-- <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script> -->
    </head>
    <body>
        <div id="app"></div>

        <!-- Bootstrap 5 JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Vue App JS -->
        @vite('resources/js/app.js')        
    </body>
</html>