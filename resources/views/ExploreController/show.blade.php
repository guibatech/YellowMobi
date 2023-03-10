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

            @if (Session::has('post-created')) 

                @include('Components.alert', [
                    'message' => Session::get('post-created')
                    ])

            @endif
        
        </section>

        <section class="mb-4">

            <form action="{{route('post.do')}}" method="POST">

                @csrf
                @method('POST')

                <div class="mb-2">
                    <textarea id="contentToShare" name="contentToShare" class="custom-text-area" placeholder="Write something awesome!" rows='1' maxlength="281"></textarea>
                </div>
                    
                <div class="d-flex justify-content-end align-items-center">
                    
                    <div class="form-text me-2" id="contentCount">0/281</div>
                    
                    <input type="submit" id="btnShare" class="btn btn-outline-primary" value="Share" title="Share">
                
                </div>

            </form>

        </section>

    </main>

    @csrf

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
