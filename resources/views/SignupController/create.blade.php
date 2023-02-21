<!DOCTYPE HTML>

<html lang="{{config('app.locale')}}">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Signup - {{config('app.name')}}</title>

    </head>

    <body>

        <form action="{{route('accounts.signup.do')}}" method="POST">

            @csrf
            @method('POST')

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@example.com">
            
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Signup">

        </form>

    </body>

</html>
