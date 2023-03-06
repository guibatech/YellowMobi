@extends('Mail.template')

@section('title')
Welcome to <span style="color: yellow;">{{config('app.fantasy_name')}}</span>!
@endsection

@section('main')

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
    <a href="{{route('accounts.activate')}}" style="background-color: white; padding: 10px 15px; border: 3px solid yellow; border-radius: 8px; text-decoration: none; color: yellow; font-weight: bold; font-size: 18px;">Activate my account</a>
</div>

@endsection
