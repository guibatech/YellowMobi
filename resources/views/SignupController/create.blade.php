@extends('template')

@section('title')
Signup
@endsection

@section('body')

<div class="sign-container mt-4">

    <div class="mb-4 text-center">
        <hgroup>
            <h1 class="display-3 fw-bold mb-3">Signup</h1>
            <h2 class="display-6 lh-14">Get started by creating a <span class="fw-bold text-primary">{{config('app.name')}}</span> account.</h2>
        </hgroup>
    </div>

    <div>
        <form action="{{route('accounts.signup.do')}}" method="POST">
            
            @csrf
            @method('POST')

            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder=" ">
                <label for="name" class="form-label">Name</label>
                @error('name')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" id="dateOfBirth" value="{{old('dateOfBirth')}}" placeholder=" ">
                    <label for="dateOfBirth" class="form-label">Date of birth</label>
                </div>
                @error('dateOfBirth')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
                <div class="form-text">You must be at least 18 years old.</div>
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="example@example.com" value="{{old('email')}}">
                    <label for="email" class="form-label">Email</label>
                </div>
                @error('email')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{old('username')}}" placeholder="@example">
                        <label for="username" class="form-label">Username</label>
                    </div>
                </div>
                @error('username')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder=" ">
                <label for="password" class="form-label">Password</label>
                @error('password')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" id="confirmPassword" placeholder=" ">
                <label for="confirmPassword" class="form-label">Confirm password</label>
                @error('confirmPassword')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-3 text-center">
                <input type="submit" value="Ready" class="btn btn-outline-primary">
            </div>

            <div class="mt-3">

                @if($errors->has('system') || $errors->has('agree'))
                    @foreach($errors->all() as $error)
                    <div class="form-text text-danger text-center">{{$error}}</div>
                    @endforeach
                @endif
           
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
