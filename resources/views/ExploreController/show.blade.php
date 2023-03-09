@extends('template')

@section('title')
Explore
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container">

        <section class="mb-4">
            
            @if (Session::has('activated-account'))

                @include('Components.alert', [
                    'message' => Session::get('activated-account')
                    ])
            
            @endif
        
        </section>

    </main>

    @csrf

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
