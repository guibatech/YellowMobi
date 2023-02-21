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

            <label for="dateOfBirth">Date of birth</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" value="{{old('dateOfBirth')}}">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@example.com" value="{{old('email')}}">
            
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{old('username')}}">
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <label for="confirmPassword">Confirm password</label>
            <input type="password" name="confirmPassword" id="confirmPassword">

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
