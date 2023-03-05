@extends('template')

@section('title')
Recover
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container">

        <section class="mb-4">
            <hgroup class="text-center">
                <h1 class="display-3 fw-bold mb-2">Recover</h1>
                <h2 class="display-6 lh-14">Forgot your password? Don't worry, we'll help you reset it.</h2>
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

            <form action="{{route('accounts.forgot.do')}}" method="POST">

                @csrf
                @method('POST')

                <div class="form-floating">
                    <input type="text" name="credential" id="credential" class="form-control" placeholder=" ">
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

                <div class="mt-3 text-center">
                    <input type="submit" value="Ready" title="Ready" class="btn btn-outline-primary">
                </div>

            </form>

        </section>

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
