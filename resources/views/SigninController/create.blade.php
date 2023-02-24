@extends('template')

@section('title')
Sign in
@endsection

@section('body')

    @include('Components.navbar')

    <form action="{{route('accounts.signin.do')}}" method="POST">

        @csrf
        @method('POST')

        <label for="credential">Email or username</label>
        <input type="text" name="credential" id="credential">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="sign in">

    </form>

@endsection
