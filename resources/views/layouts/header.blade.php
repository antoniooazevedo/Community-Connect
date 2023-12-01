@section('header')
    <div class="header-content">
        <div class="image-and-side-bar-icon">
            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 60 50" fill="white">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.2857 10C1.9188 10 0 7.7614 0 5C0 2.2386 1.9188 0 4.2857 0H55.7145C58.081 0 60 2.2386 60 5C60 7.7614 58.081 10 55.7145 10H4.2857ZM4.2857 30C1.9188 30 0 27.7615 0 25C0 22.2385 1.9188 20 4.2857 20H55.7145C58.081 20 60 22.2385 60 25C60 27.7615 58.081 30 55.7145 30H4.2857ZM4.2857 50C1.9188 50 0 47.7615 0 45C0 42.2385 1.9188 40 4.2857 40H55.7145C58.081 40 60 42.2385 60 45C60 47.7615 58.081 50 55.7145 50H4.2857Z" />
            </svg>
            <a class="cc-logo-with-text" href="{{ route('questions') }}">
                <img id="CC-image" src="{{ asset('assets/logo.png') }}"  alt="community connect logo with text" />
            </a>
        </div>
        @if (Request::route()->getName() == 'questions') <!-- TODO -->
            <div class="mid-header">
                <form action="{{ url('/questions') }}" class="main-search" method="GET">
                    <input type="text" name="text" class="live-search" placeholder="{{ request('text', 'Search') }}" value="{{ request('text') }}" />
                    <button type="submit" class="main-search-button">
                        <img src="{{ asset('assets/search.png') }}" alt="search icon" />
                    </button>
                    <div class="search-bar-info hidden">
                        <p><strong>"word"</strong> exact search</p>
                        <p><strong>[tag]</strong> search by tag</p>
                    </div>
                </form>
            </div>
        @endif
        <div class="right-header">
            @guest
                <div class="group-buttons">
                    <a href="{{ route('login') }}" class="sign-in-button">Sign In</a>
                    <a href="{{ route('register') }}" class="sign-up-button">Sign Up</a>
                </div>
            @endguest
            @auth
                <div class="group-buttons">
                    <a href="{{ route('profile', Auth::user()->id) }}" class="my-account-button">My account ({{ Auth::user()->username }})</a>
                    <a href="{{ route('logout') }}" class="logout-button">Logout</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
