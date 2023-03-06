@extends('Mail.template')

@section('title')
Shall we reset your password?
@endsection

@section('main')

<p style="font-size: 15px;">
    You recently requested to reset your {{config('app.name')}} 
    account password.
</p>

<p style="font-size: 15px;">
    If you weren't the one who requested this password
    reset, just ignore it. If that was you, just click
    the button below and we'll redirect you to the
    password reset form.
</p>

<p style="font-size: 15px">
    Remember, the password reset link we provide you
    is secret and to maintain the security of your
    account, you must not disclose it.
</p>

<div style="margin: 45px 0px; text-align: center;">
    <a href="{{route('accounts.password', ['token' => $passwordResetToken])}}" style="background-color: white; padding: 10px 15px; border: 3px solid yellow; border-radius: 8px; text-decoration: none; color: yellow; font-weight: bold; font-size: 18px;" target="_BLANK">Reset my password</a>
</div>

@endsection
