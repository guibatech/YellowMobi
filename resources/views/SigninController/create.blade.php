@extends('template')

@section('title')
Sign in
@endsection

@section('body')

    @include('Components.header')

    <main class="sign-container mt-4">

        <section>

            <hgroup class="mb-4 text-center">
                <h1 class="display-3 fw-bold mb-2">Sign in</h1>
                <h2 class="display-6 lh-14">Share yourself with the world.</h2>
            </hgroup>
        
        </section>

        <section>

            <form action="{{route('accounts.signin.do')}}" method="POST">

                @csrf
                @method('POST')

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="credential" id="credential" class="form-control @error('credential') has-error @enderror" placeholder=" " value="{{old('credential')}}" @error('credential') autofocus @enderror @error('system') autofocus @enderror>
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
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror" placeholder=" " @error('password') autofocus @enderror>
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

                <div class="mt-3 text-center">
                    <input type="submit" value="Sign in" title="Sign in" class="btn btn-outline-primary">
                </div>
                
                <div class="mt-3 text-center">
                    @if($errors->has('system'))
                        @foreach($errors->get('system') as $error)
                        <div>
                            <p class="form-text text-danger">{{$error}}</p>
                        </div>    
                        @endforeach
                    @endif
                </div>

            </form>

        </section>
    
    </main>

@endsection
