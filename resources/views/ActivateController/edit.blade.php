@extends('template')

@section('title')
Activate your account
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container">

        <section class="mb-4">

            <hgroup class="text-center">
                <h1 class="display-3 fw-bold mb-2">Activate your account</h1>
                <h2 class="display-6 lh-14">Enter the activation token that was sent to your email.</h2>
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

            @if(Session::has('resend'))

                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div>{{Session::get('resend')}}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            
            @endif

        </section>

        <section class="mb-5">

            @include('Components.token', [
                'destinationRoute' => "accounts.activate.do",
                'destinationMethod' => "PUT",
                'token' => Auth::user()->activation_token,
            ])

            <div class="mt-3 text-center">

                <a href="{{route('accounts.activate.resend')}}" title="Resend token">Resend token</a>

            </div>
        
        </section>

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')
    @vite('resources/js/token.js')

@endsection
