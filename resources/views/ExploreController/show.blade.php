@extends('template')

@section('title')
Explore
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container">

        <section class="mb-4">
            
            @if (Session::has('activated-account'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div>{{Session::get('activated-account')}}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
        </section>

    </main>

    @csrf

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
