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
            <input type="email" name="email" id="email" placeholder="example@example.com" value="{{old('email')}}">
            
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{old('username')}}">
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <div>
                @foreach($errors->all() as $error)
                <div>
                    <p>{{$error}}</p>
                </div>
                @endforeach
            </div>

            <input type="submit" value="Signup">

        </form>

    </body>

</html>
