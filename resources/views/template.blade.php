<!DOCTYPE HTML>

<html lang="{{config('app.locale')}}">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title') - {{config('app.name')}}</title>

    </head>

    <body>

        @yield('body')

    </body>

</html>
