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
                    <textarea id="contentToShare" name="contentToShare" class="custom-text-area" placeholder="Write something awesome!" rows='1' maxlength="281" spellcheck="false"></textarea>
                </div>

                <div class="d-flex align-items-center">

                    <div class="me-auto">
                        
                        <label for="contentImages" class="number-images-flag d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="rgb(215, 215, 215)" class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                            </svg>
                            <input type="file" name="contentImages" id="contentImages" hidden multiple></input>
                            <span id="amountImages" class="form-text ms-2 mt-0 fw-bold"></span>
                        </label>
                    
                    </div>

                    <div class="d-flex justify-content-end align-items-center">

                        <div class="form-text me-2 mt-0 fw-bold" id="currentContentSize"></div>
                        <input type="submit" id="btnShare" class="btn btn-outline-primary" value="Share" title="Share">
                    
                    </div>

                </div>

            </form>

        </section>

    </main>

    @csrf

@endsection

@section('scripts')

    @vite('resources/js/header.js')
    @vite('resources/js/explore.js')

@endsection
