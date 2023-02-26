<header class="ps-4 pe-4 pt-3 d-flex align-items-center">

    <div class="me-auto">
        <a href="{{route('explore')}}" class="fs-1 fw-bold text-decoration-none">{{config('app.fantasy_name')}}</a>
    </div>

    <nav class="dropdown">

        @if (Auth::check())

            <a class="d-block text-decoration-none link-dark" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://avatars.githubusercontent.com/u/125931531?v=4" alt="mdo" class="photo-profile rounded-circle">
            </a>
                    
            <ul class="dropdown-menu text-small shadow text-center">
                <li><a class="dropdown-item cursor-pointer" href="#" target="_SELF" title="Access my profile ({{'@'.Auth::user()->username}}).">{{'@'.Auth::user()->username}}</a></li>
                <li><a class="dropdown-item cursor-pointer" href="#" target="_SELF" title="Explore">Explore</a></li>
                <li><a class="dropdown-item cursor-pointer" href="#" target="_SELF" title="Settings">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item cursor-pointer" target="_SELF" title="Sign out" id="btnSignin">Sign out</a></li>
            </ul>

        @else

            @if (Route::currentRouteName() == 'accounts.signin')
                <a href="{{route('accounts.signup')}}" target="_SELF" title="Sign up" class="btn btn-outline-primary">Sign up</a>
            @else
                <a href="{{route('accounts.signin')}}" target="_SELF" title="Sign in" class="btn btn-outline-primary">Sign in</a>
            @endif

        @endif
            
    </nav>

</header>
