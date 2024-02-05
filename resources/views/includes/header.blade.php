<header class="d-flex align-items-center">
    <div class='container d-flex align-items-center position-relative'>
        
        <a href="/">
            <img
                src="/assets/img/agricgate-farm-logo-3.png"
                id="page-logo"
                alt="Picture of the author"
            />
        </a>

        <div class='ms-3 align-items-center justify-content-between w-100 navs-wrapper'>
            
            <div class='search-wrapper position-relative'>
                <button class="btn" id="searchBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27" fill="none" class="search-icon">
                        <path d="M18.6946 17.5274C20.2196 15.3903 20.9026 12.7406 20.607 10.1086C20.3114 7.47651 19.059 5.05611 17.1004 3.33161C15.1417 1.60712 12.6212 0.705714 10.0432 0.807729C7.46512 0.909744 5.01964 2.00766 3.19599 3.88182C1.37234 5.75598 0.305005 8.26817 0.207513 10.9158C0.110022 13.5634 0.989567 16.1512 2.67018 18.1615C4.3508 20.1717 6.70855 21.4562 9.27172 21.7578C11.8349 22.0595 14.4145 21.3562 16.4944 19.7885H16.4928C16.54 19.8532 16.5904 19.9147 16.6471 19.9745L22.7107 26.2015C23.006 26.505 23.4066 26.6756 23.8244 26.6757C24.2422 26.6759 24.6429 26.5056 24.9384 26.2023C25.2339 25.8991 25.4 25.4876 25.4002 25.0586C25.4003 24.6295 25.2345 24.218 24.9392 23.9145L18.8757 17.6875C18.8194 17.629 18.7588 17.5765 18.6946 17.5274ZM19.1009 11.3101C19.1009 12.4783 18.8768 13.635 18.4415 14.7143C18.0062 15.7936 17.3682 16.7743 16.5638 17.6003C15.7595 18.4263 14.8045 19.0816 13.7536 19.5287C12.7027 19.9757 11.5763 20.2058 10.4387 20.2058C9.30119 20.2058 8.1748 19.9757 7.12385 19.5287C6.07291 19.0816 5.118 18.4263 4.31364 17.6003C3.50929 16.7743 2.87123 15.7936 2.43592 14.7143C2.0006 13.635 1.77655 12.4783 1.77655 11.3101C1.77655 8.95077 2.68917 6.68811 4.31364 5.01984C5.93812 3.35156 8.14137 2.41434 10.4387 2.41434C12.7361 2.41434 14.9393 3.35156 16.5638 5.01984C18.1883 6.68811 19.1009 8.95077 19.1009 11.3101Z" fill="#7F7F7F"/>
                    </svg>
                </button>
                <input class='main-search-input' placeholder="{{ __('Search for courses...') }}"  id="mainSearchInput" />
                <div class="search-results-wrapper" id="search-results-wrapper">

                    <h6 class="mb-3">{{ __('Recent searches') }}</h6>

                    <input type="hidden" value="false" id="searchHistoryFetchStatus" />
                   
                </div>
            </div>

            <nav class='d-flex align-items-center'>
                <a href='/explore' class='me-2'>{{ __('Explore') }}</a>

                @auth
                    <div class="dropdown ms-4">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_img_url }}" class="me-2"/> {{ Auth::user()->username }}
                        </button>
                        <ul class="shadow dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('account') }}">{{ __('Account') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('account', [ 'tab' => 'bookmarks' ]) }}">{{ __('My Bookmarks') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('account', [ 'tab' => 'history' ]) }}">{{ __('History') }} </a></li>
                            <hr class="mb-0">
                            <li><a class="dropdown-item text-center pt-0 ps-3" href="/logout">{{ __('Log out') }}</a></li>
                        </ul>
                    </div>
                @endauth

                @guest
                    <button class='btn btn-outline-success ms-4' data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('Log in') }}</button>
                    <button class='btn btn-success ms-4' data-bs-toggle="modal" data-bs-target="#registerModal">{{ __('Sign up') }}</button>
                @endguest

            </nav>

        </div>

        <div class="navs-wrapper-mobile ms-auto">

            <button class="btn me-2" id="showSearchBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27" fill="none">
                    <path d="M18.6946 17.5274C20.2196 15.3903 20.9026 12.7406 20.607 10.1086C20.3114 7.47651 19.059 5.05611 17.1004 3.33161C15.1417 1.60712 12.6212 0.705714 10.0432 0.807729C7.46512 0.909744 5.01964 2.00766 3.19599 3.88182C1.37234 5.75598 0.305005 8.26817 0.207513 10.9158C0.110022 13.5634 0.989567 16.1512 2.67018 18.1615C4.3508 20.1717 6.70855 21.4562 9.27172 21.7578C11.8349 22.0595 14.4145 21.3562 16.4944 19.7885H16.4928C16.54 19.8532 16.5904 19.9147 16.6471 19.9745L22.7107 26.2015C23.006 26.505 23.4066 26.6756 23.8244 26.6757C24.2422 26.6759 24.6429 26.5056 24.9384 26.2023C25.2339 25.8991 25.4 25.4876 25.4002 25.0586C25.4003 24.6295 25.2345 24.218 24.9392 23.9145L18.8757 17.6875C18.8194 17.629 18.7588 17.5765 18.6946 17.5274ZM19.1009 11.3101C19.1009 12.4783 18.8768 13.635 18.4415 14.7143C18.0062 15.7936 17.3682 16.7743 16.5638 17.6003C15.7595 18.4263 14.8045 19.0816 13.7536 19.5287C12.7027 19.9757 11.5763 20.2058 10.4387 20.2058C9.30119 20.2058 8.1748 19.9757 7.12385 19.5287C6.07291 19.0816 5.118 18.4263 4.31364 17.6003C3.50929 16.7743 2.87123 15.7936 2.43592 14.7143C2.0006 13.635 1.77655 12.4783 1.77655 11.3101C1.77655 8.95077 2.68917 6.68811 4.31364 5.01984C5.93812 3.35156 8.14137 2.41434 10.4387 2.41434C12.7361 2.41434 14.9393 3.35156 16.5638 5.01984C18.1883 6.68811 19.1009 8.95077 19.1009 11.3101Z" fill="#7F7F7F"/>
                </svg>
            </button>

            <button class="btn shadow-none d-flex flex-column align-items-center" id="showMobileNavsBtn">
                <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="90" height="90" fill="url(#pattern0)"/>
                    <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_456_19" transform="scale(0.0111111)"/>
                    </pattern>
                    <image id="image0_456_19" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAv0lEQVR4nO3awWrCQABF0Ys7/XxrqV9pu2m3kUDWYmahAz0H8gOXMAN5KQAAAAAAAADe6lR9Vj/V4ulRg+/qUh1HQl/Fbe8Ltjbb5VD9Cd3e0L9bO6GbLLSjo6HQXw1YD/aP7aB3Gfawwa06j16GAAAAAAD/nHG2p7/DG2d77WhhnO01oY2zTRp65b+OjLPLZIOxcRYAAAAAYJxxNuPsMsHHfuNs7wttnG3S0CvjbMbZZYLz2DgLAAAAAAAA0GTuqD9gUMDt6+cAAAAASUVORK5CYII="/>
                    </defs>
                </svg>
                <p>MENU</p>
            </button>

        </div>

        <div class="dropdown ms-3">
            
            <button class="btn btn-secondary dropdown-toggle" type="button" id="setLocaleBtn" data-bs-toggle="dropdown" aria-expanded="false">
                
                <img src="{{ asset('assets/img/globe.png') }}" alt="globe" />

            </button>
            <ul class="dropdown-menu pb-4">
                <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'en' ] ) }}">English</a></li>
                <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'tw' ] ) }}">Twi</a></li>
                <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'fr' ] ) }}">French</a></li>
            </ul>
        </div>

    </div>


</header>