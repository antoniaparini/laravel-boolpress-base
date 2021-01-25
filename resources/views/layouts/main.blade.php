<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <title>Laravel</title>

        <!-- Styles -->
    </head>
    <body>
        <!-- Include partials.header -->
        @include('partials.header')


        <main>

            @yield('content')

        </main>

        <!-- Include partials.footer -->
        @include('partials.footer')
      



      
    </body>
</html>
