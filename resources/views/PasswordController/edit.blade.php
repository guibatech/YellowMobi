@extends('template')

@section('title')
Password
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container">

        <section class="mb-4">

            <hgroup class="text-center">
                <h1 class="display-3 fw-bold mb-2">Password</h1>
                <h2 class="display-6 lh-14">Choose a new access password.</h2>
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

        @if($validToken)
        <section class="mb-4">

            <form action="{{route('accounts.password.do', ['token' => $token])}}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror" placeholder=" " value="{{old('password')}}" @error('password') autofocus @enderror>
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

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control @error('confirmPassword') has-error @enderror" placeholder=" " value="{{old('confirmPassword')}}" @error('confirmPassword') autofocus @enderror>
                        <label for="confirmPassword" class="form-label">Confirm password</label>
                    </div>
                    <div>
                        @if($errors->has('confirmPassword'))
                            @foreach($errors->get('confirmPassword') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="text-center mt-3">
                    <input type="submit" value="Reset password" title="Reset password" class="btn btn-outline-primary">
                </div>

            </form>

        </section>
        @endif

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
