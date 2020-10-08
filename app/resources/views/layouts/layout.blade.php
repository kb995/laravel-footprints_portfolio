<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">

    <link href="{{ asset('./css/app.css' )}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    @include('layouts.header')

    <main>
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
