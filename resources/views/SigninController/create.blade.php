@extends('template')

@section('title')
Sign in
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container">

        <section class="mb-4">

            <hgroup class="text-center">
                <h1 class="display-3 fw-bold mb-2">Sign in</h1>
                <h2 class="display-6 lh-14">Share yourself with the world.</h2>
            </hgroup>
        
        </section>

        <section class="mb-4">

            @if($errors->has('system'))

                @foreach($errors->get('system') as $error)
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div>{{$error}}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            
            @endif

        </section>

        <section class="mb-4">

            <form action="{{route('accounts.signin.do')}}" method="POST">

                @csrf
                @method('POST')

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="credential" id="credential" class="form-control @error('credential') has-error @enderror" placeholder=" " value="{{old('credential')}}" @error('credential') autofocus @enderror @error('system') autofocus @enderror>
                        <label for="credential" class="form-label">Email or @username</label>
                    </div>
                    <div>
                        @if($errors->has('credential'))
                            @foreach($errors->get('credential') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror" placeholder=" " @error('password') autofocus @enderror>
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div>
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <input type="submit" value="Sign in" title="Sign in" class="btn btn-outline-primary">
                </div>

            </form>

        </section>

        <section class="mb-4 text-center">
            <a href="{{route('accounts.forgot')}}" title="Forgot your password?">Forgot your password?</a>
        </section>
    
    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
