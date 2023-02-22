@extends('template')

@section('title')
Signup
@endsection

@section('body')

<div class="container">

    <div class="mb-4 mt-3 text-center">
        <hgroup>
            <h1 class="display-3 fw-bold">Signup</h1>
            <h2 class="display-6">Get started by creating a <span class="fw-bold text-primary">{{config('app.name')}}</span> account.</h2>
        </hgroup>
    </div>

    <div>
        <form action="{{route('accounts.signup.do')}}" method="POST">
            
            @csrf
            @method('POST')

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder=" ">
                <label for="name">Name</label>
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" value="{{old('dateOfBirth')}}" placeholder=" ">
                    <label for="dateOfBirth">Date of birth</label>
                </div>
                <span class="form-text">You must be at least 18 years old.</span>
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com" value="{{old('email')}}">
                    <label for="email">Email</label>
                </div>
                <span class="form-text">We'll never share your email with anyone else.</span>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}" placeholder="@example">
                    <label for="username">Username</label>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder=" ">
                <label for="password">Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder=" ">
                <label for="confirmPassword">Confirm password</label>
            </div>

            <div class="mb-2 mt-2">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endforeach
            </div>

            <div class="mt-3 text-center">
                <input type="submit" value="Ready" class="btn btn-outline-primary">
            </div>

            <div class="form-check form-switch mb-5 mt-4">
                <input type="checkbox" class="form-check-input" role="switch" name="agree" id="agree">
                <label for="agree" class="form-check-label">
                    By creating my account, I accept the 
                    <a href="#1" title="Access the Community Rules.">Community Rules</a> and
                    <a href="#2" title="Access the Privacy Policy.">Privacy Policy</a>.
                </label>
            </div>

        </form>
    </div>

</div>

@endsection
