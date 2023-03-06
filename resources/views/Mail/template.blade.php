<div style="width: 500px; margin-top: 0px; margin-bottom: 0px; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; text-align: justify;">

    <header>
    
        <hgroup>

            <h1 style="font-weight: 700; font-size: 50px; margin-top: 0px; margin-bottom: 15px;">
                @yield('title')
            </h1>
        
        </hgroup>
    
    </header>

    <main>

        <p style="font-size: 15px;">
            Hi {{$name}} ({{'@'.$username}}), how are you?
        </p>

        @yield('main')
        
        <p style="font-size: 15px;">
            See you over there!
        </p>

        <p style="font-size: 15px;">
            Yours sincerely,
        </p>
        
        <p style="font-size: 15px;">
            {{config('app.name')}}.
        </p>

    </main>

</div>
