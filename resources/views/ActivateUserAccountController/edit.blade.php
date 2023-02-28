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

        </section>

        <section>

            <div>

                <form action="{{route('accounts.activate.do')}}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="d-flex flex-wrap justify-content-center">
                            
                        @foreach(str_split(Auth::user()->activation_token, 1) as $position => $digit)
                            <input type="text" id="digit_{{$position}}" name="digit_{{$position}}" class='input-activation-token @error("digit_{$position}") has-error @enderror' maxlength="1" value='{{old("digit_{$position}")}}' @error("digit_{$position}") autofocus @enderror>
                        @endforeach
                        
                    </div>

                    <div class="mt-3 text-center">
                        <input type="submit" value="Ready" title="Ready" id="btnReady" class="btn btn-outline-primary" hidden>
                    </div>

                </form>

            </div>

            <div class="mt-3 text-center mb-5">

                <a href="{{route('accounts.activate.resend')}}" title="Resend token">Resend token</a>

            </div>
        
        </section>

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')
    @vite('resources/js/activate.js')

@endsection
