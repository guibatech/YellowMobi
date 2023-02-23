<h1>Welcome to {{config('app.fantasy_name')}}!</h1>

<p>
    Hi {{$name}} ({{'@'.$username}}), 
</p>

<p>
    You have created a {{config('app.name')}} account. To use it, sign in.
</p>

<p>
    For security reasons, upon your first sign in, you will
    likely need to activate your account so that we know
    this email address is real and exists. If necessary,
    use token <strong>{{$activationToken}}</strong>.
</p>

<a href="{{route('accounts.signin')}}">Sign in</a>

<p>See you over there!</p>

<p>Yours sincerely,</p>
<p>{{config('app.name')}}.</p>
