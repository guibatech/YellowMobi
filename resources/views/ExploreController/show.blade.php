@extends('template')

@section('title')
Explore
@endsection

@section('body')

    @include('Components.header')

    <main class="custom-container">

        <section class="mb-2">
            
            @if (Session::has('activated-account'))

                @include('Components.alert', [
                    'message' => Session::get('activated-account')
                ])
            
            @endif
        
        </section>

        <section class="left-to-right-animation mb-4">

            <div class="mb-2" id="postMessageBox"></div>

            <div>

                <form action="{{route('post.do')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('POST')

                    <div class="post-content-container">

                        <div id="postTextareaContainer" class="post-textarea-container">
                            <textarea id="postText" name="postText" class="form-control post-textarea mt-0" placeholder="Post something awesome!" spellcheck="false" maxLength="300" rows="1">{{old('postText')}}</textarea>
                        </div>

                    </div>

                    <div class="post-actions-container mt-2 d-flex">

                        <label for="postImage" id="postImageLabel" class="post-image-label me-auto d-flex align-items-center"></label>
                        <input type="file" name="postImage" id="postImage" class="post-image-input" accept="image/png, image/jpeg, image/jpg, image/gif" value="{{old('postImage')}}">
                        
                        <div class="post-details-container d-flex align-items-center">

                            <span class="form-text me-2 mt-0" id="postCharacterCount"></span>
                            <input type="submit" value="Post" id="btnPost" class="btn btn-outline-primary" title="Post (Enter)">

                        </div>

                    </div>

                </form>

            </div>

        </section>

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')
    @vite('resources/js/explore.js')

@endsection
