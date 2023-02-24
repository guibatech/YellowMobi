<div style="width: 500px; margin-top: 0px; margin-bottom: 0px; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; text-align: justify;">

    <h1 style="font-weight: 700; font-size: 50px; margin-top: 0px; margin-bottom: 15px;">Welcome to <span style="color: yellow;">{{config('app.fantasy_name')}}</span>!</h1>

    <p style="font-size: 15px;">
        Hi {{$name}} ({{'@'.$username}}), how are you?
    </p>

    <p style="font-size: 15px;">
        You have recently created a {{config('app.name')}} account. 
        Congratulations and welcome.
    </p>

    <p style="font-size: 15px;">
        For security reasons, when logging in to your account 
        for first time, you will need to activate it so that 
        we know that the email address you used when registering 
        is real and belongs to you. Your activation token is 
        <strong>{{$activationToken}}</strong>.
    </p>

    <div style="margin: 45px 0px; text-align: center;">
        <a href="{{route('accounts.signin')}}" style="background-color: white; padding: 10px 15px; border: 3px solid yellow; border-radius: 8px; text-decoration: none; color: yellow; font-weight: bold; font-size: 18px;">Activate my account</a>
    </div>

    <p style="font-size: 15px;">See you over there!</p>

    <p style="font-size: 15px;">Yours sincerely,</p>
    <p style="font-size: 15px;">{{config('app.name')}}.</p>

</div>
