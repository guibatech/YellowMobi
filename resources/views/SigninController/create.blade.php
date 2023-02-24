@extends('template')

@section('title')
Sign in
@endsection

@section('body')

    @include('Components.navbar')

    <div class="sign-container mt-4">

        <div>
            <hgroup class="mb-4 text-center">
                <h1 class="display-3 fw-bold mb-2">Sign in</h1>
                <h2 class="display-6 lh-14">Share yourself with the world.</h2>
            </hgroup>
        </div>

        <div>
            <form action="{{route('accounts.signin.do')}}" method="POST">

                @csrf
                @method('POST')

                <div class="form-floating mb-3">
                    <input type="text" name="credential" id="credential" class="form-control @error('credential') has-error @enderror" placeholder=" " value="{{old('credential')}}" @error('credential') autofocus @enderror>
                    <label for="credential" class="form-label">Email or username</label>
                    @error('credential')
                    <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror" placeholder=" " @error('password') autofocus @enderror>
                    <label for="password" class="form-label">Password</label>
                    @error('password')
                    <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mt-3 text-center">
                    <input type="submit" value="Sign in" class="btn btn-outline-primary">
                </div>

            </form>
        </div>
    
    </div>

@endsection
