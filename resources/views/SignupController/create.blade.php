@extends('template')

@section('title')
Sign up
@endsection

@section('body')

    @include('Components.header')

    <main class="custom-container">

        <section class="mb-4">

            <hgroup class="text-center">
                <h1 class="display-3 fw-bold mb-2">Sign up</h1>
                <h2 class="display-6 lh-14">Get started by creating a <span class="fw-bold text-primary">{{config('app.name')}}</span> account.</h2>
            </hgroup>
        
        </section>

        <section class="mb-4">

            @if($errors->has('system'))
                
                @foreach($errors->get('system') as $error)
                
                    @include('Components.alert', [
                        'message' => $error
                        ])

                @endforeach

            @endif

        </section>

        <section>

            <form action="{{route('accounts.signup.do')}}" method="POST">
                
                @csrf
                @method('POST')

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') has-error @enderror" name="name" id="name" value="{{old('name')}}" placeholder=" " @error('name') autofocus @enderror>
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div>
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="date" class="form-control @error('dateOfBirth') has-error @enderror" name="dateOfBirth" id="dateOfBirth" value="{{old('dateOfBirth')}}" placeholder=" " @error('dateOfBirth') autofocus @enderror>
                        <label for="dateOfBirth" class="form-label">Date of birth</label>
                    </div>
                    <div>
                        @if($errors->has('dateOfBirth'))
                            @foreach($errors->get('dateOfBirth') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <p class="form-text">You must be at least 18 years old.</p>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') has-error @enderror" name="email" id="email" placeholder="example@example.com" @if(Session::has('email')) value="{{Session::get('email')}}" @else value="{{old('email')}}" @endif @error('email') autofocus @enderror>
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div>
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <p class="form-text">We'll never share your email with anyone else.</p>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error('username') has-error @enderror" name="username" id="username" aria-label="username" @if(Session::has('username')) value="{{Session::get('username')}}" @else value="{{old('username')}}" @endif placeholder="@example" @error('username') autofocus @enderror>
                            <label for="username" class="form-label">Username</label>
                        </div>
                    </div>
                    <div>
                        @if($errors->has('username'))
                            @foreach($errors->get('username') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') has-error @enderror" name="password" id="password" placeholder=" " @error('password') autofocus @enderror>
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div>
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control @error('confirmPassword') has-error @enderror" name="confirmPassword" id="confirmPassword" placeholder=" " @error('confirmPassword') autofocus @enderror>
                        <label for="confirmPassword" class="form-label">Confirm password</label>
                    </div>
                    <div>
                        @if($errors->has('confirmPassword'))
                            @foreach($errors->get('confirmPassword') as $error)
                            <div>
                                <p class="form-text text-danger">{{$error}}</p>
                            </div>    
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <input type="submit" value="Ready" title="Ready" class="btn btn-outline-primary">
                </div>

                <div class="mt-3">

                    <div>
                        @if($errors->has('agree'))
                            
                            @foreach($errors->get('agree') as $error)
                                
                                @include('Components.alert', [
                                    'message' => $error
                                    ])
                            
                            @endforeach
                        
                        @endif
                    </div>

                </div>

                <div class="form-check form-switch mb-5 mt-4">
                    <input type="checkbox" class="form-check-input" role="switch" name="agree" id="agree" @error('agree') autofocus @enderror>
                    <label for="agree" class="form-check-label">
                        By creating my account, I accept the 
                        <a href="#1" title="Access the Community Rules.">Community Rules</a> and
                        <a href="#2" title="Access the Privacy Policy.">Privacy Policy</a>.
                    </label>
                </div>

            </form>

        </section>

    </main>

@endsection

@section('scripts')

    @vite('resources/js/header.js')

@endsection
