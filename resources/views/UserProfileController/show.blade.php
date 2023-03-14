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

            @include('Components.alert', [
                'message' => 'This profile does not exist.'
                ])

        @else

            <section class="mb-4">

                <div class="profile-user-photo-size-container">
                    @include('Components.photo', [
                        'user' => $user,
                        ])
                </div>
                
                <div>
                    <p>{{$user->profile->name}}</p>
                    <p>{{'@'.$user->username}}</p>
                    <p>{{$user->profile->bio}}</p>
                </div>

            </section>

            <section>

                <div>
                    <p>Following: 0</p>
                    <p>Followers: 0</p>
                </div>

            </section>

            <section>

                <div>
                    <button>Follow</button>
                    <button>Unfollow</button>
                </div>

            </section>

            <section>

                <p>This user's posts will be listed here.</p>

            </section>

        @endif

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection