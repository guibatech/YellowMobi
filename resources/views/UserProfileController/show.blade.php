@extends('template')

@section('title')

    @if ($user == null)

        Profile not found!

    @else

        {{$user->profile->name}} ({{'@'.$user->username}})
    
    @endif

@endsection

@section('body')

    @include('Components.header')

    <main class="custom-container fast-slide-animation">

        @if ($user == null)

            <section class="mb-3">

                @include('Components.alert', [
                    'message' => 'This profile does not exist.'
                    ])
            
            </section>

        @else

            @if(Auth::check() && Auth::user()->id == $user->id)
                
                <section class="mb-3 d-flex">
                    <button class="ms-auto btn btn-outline-primary">Edit</button>
                </section>
            
            @endif

            <section class="mb-3 d-flex align-items-center">

                <div class="profile-user-photo-size-container">
                    @include('Components.photo', [
                        'user' => $user,
                        ])
                </div>
                
                <div class="ms-2">

                    <div class="d-flex align-items-center">

                        <p class="mb-0 display-6 me-2">{{$user->profile->name}}</p>
                    
                        @if ($user->profile->premium == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="blue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        @endif
                    
                    </div>
                    
                    <p class="mb-0 fs-6 form-text mt-0">{{'@'.$user->username}}</p>
                
                </div>

            </section>

            <section class="mb-4">

                <p class="mb-0 text-justify lh-14 fs-14">{{$user->profile->bio}}</p>

            </section>

            <section class="mb-4">

                <div class="d-flex justify-content-evenly">

                    <a href="{{route('user.profile', ['username' => $user->username])}}" target="_SELF" class="text-decoration-none text-dark" title="{{count($user->posts)}} post(s).">
                        <div class="d-flex flex-column">
                            <span class="text-center fw-bold fs-6">{{count($user->posts)}}</span>
                            <span class="text-center fs-12">Post(s)</span>
                        </div>
                    </a>

                    <a href="#2" target="_SELF" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column">
                            <span class="text-center fw-bold fs-6">0</span>
                            <span class="text-center fs-12">Following</span>
                        </div>
                    </a>

                    <a href="#3" target="_SELF" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column">
                            <span class="text-center fw-bold fs-6">0</span>
                            <span class="text-center fs-12">Follower(s)</span>
                        </div>
                    </a>

                </div>

            </section>

            @if(Auth::check() && Auth::user()->id != $user->id)

                <section class="mb-4">

                    <div class="d-none">
                        <button class="btn btn-outline-primary w-100">Follow</button>
                    </div>

                    <div>
                        <button class="btn btn-outline-danger w-100">Unfollow</button>
                    </div>

                </section>
            
            @endif

            <section class="mb-5">

                @if (count ($user->posts) <= 0)

                    @include('Components.alert', [
                        'message' => "{$user->profile->name} has no posts yet.",
                        ])

                @endif

                @foreach($user->posts as $post) 

                    <article class="mb-3 border rounded">
                        
                        <div class="m-3">
                            
                            <a href="{{route('user.profile', ['username' => $user->username])}}" target="_SELF" class="d-flex align-items-center cursor-pointer text-decoration-none text-dark">
                                
                                <div class="post-user-photo-size-container">
                                    @include('Components.photo', [
                                        'user' => $user,
                                        ])
                                </div>

                                <div class="ms-2">
                                    
                                    <div class="d-flex align-items-center">

                                        <p class="mb-0 fs-16 me-1">{{$user->profile->name}}</p>
                                    
                                        @if ($user->profile->premium == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="blue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                            </svg>
                                        @endif
                                    
                                    </div>
                                    
                                    <p class="mb-0 mt-0 fs-12 form-text">{{'@'.$user->username}}</p>
                                
                                </div>

                            </a>

                            <div class="mt-3">
                                <p class="mb-0 text-justify fs-14">{{$post->content}}</p>
                            </div>
                        
                        </div>

                        @if ($post->image != null)

                            <figure class="pt-1">
                                <img src="/storage/{{$post->image->path}}" class="w-100">
                            </figure>
                        
                        @endif

                        <div class="m-3">
                            <p class="text-justify fs-12 form-text mt-0">Posted in {{(new DateTime($post->created_at))->format('d M Y H:i')}}</p>
                        </div>
                    
                    </article>

                @endforeach

            </section>

        @endif

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection