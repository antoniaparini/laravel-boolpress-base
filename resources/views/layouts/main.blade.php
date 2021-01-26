<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Blog</title>
        <!-- Bootstrap -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css'/>
    </head>

    <body>
        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>