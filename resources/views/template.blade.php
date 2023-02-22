<!DOCTYPE HTML>

<html lang="{{config('app.locale')}}">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title') - {{config('app.name')}}</title>

        @vite('resources/css/app.scss')

        @yield('styles')

    </head>

    <body>

        @yield('body')

        @vite('node_modules/bootstrap/dist/js/bootstrap.bundle.js')
        @vite('resources/js/app.js')

        @yield('scripts')

    </body>

</html>
