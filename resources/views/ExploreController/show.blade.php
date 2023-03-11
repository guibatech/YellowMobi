@extends('template')

@section('title')
Explore
@endsection

@section('body')

    @include('Components.header')

    <main class="custom-container">

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

                <div class="post-content-container">

                    <div class="post-textarea-container">
                        <textarea id="postText" name="postText" class="form-control post-textarea" placeholder="Post something awesome!" spellcheck="false" rows="3" maxLength="320"></textarea>
                    </div>

                </div>

                <div class="post-actions-container mt-2 d-flex">

                    <label for="postImage" class="post-image-label me-auto d-flex align-items-center">
                        + add a photo
                    </label>
                    <input type="file" name="postImage" id="postImage" class="post-image-input" accept="image/png, image/jpeg, image/gif">
                        
                    <div class="post-details-container d-flex align-items-center">

                        <span class="form-text me-2 mt-0" id="postCharacterCount">0</span>
                        <input type="submit" value="Post" id="btnPost" class="btn btn-outline-primary" title="Post">

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
