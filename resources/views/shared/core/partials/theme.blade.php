@if(!empty(Auth::user()->settings->theme) && Auth::user()->settings->theme !== "Blue")

    @if (Auth::user()->settings->theme === 'Purple')

        <link rel="stylesheet" id="css-theme" href='{{ mix("/css/themes/amethyst.css") }}'>

    @endif

    @if (Auth::user()->settings->theme === 'Red')

        <link rel="stylesheet" id="css-theme" href='{{ mix("/css/themes/city.css") }}'>

    @endif

    @if (Auth::user()->settings->theme === 'Green')

        <link rel="stylesheet" id="css-theme" href='{{ mix("/css/themes/flat.css") }}'>

    @endif

    @if (Auth::user()->settings->theme === 'Cyan')

        <link rel="stylesheet" id="css-theme" href='{{ mix("/css/themes/modern.css") }}'>

    @endif

    @if (Auth::user()->settings->theme === 'Pink')

        <link rel="stylesheet" id="css-theme" href='{{ mix("/css/themes/smooth.css") }}'>

    @endif

@endif