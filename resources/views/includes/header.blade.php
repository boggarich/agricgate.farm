<header class="d-flex align-items-center">
    <div class='container-xxl d-flex align-items-center position-relative'>
        
        <a href="/">
            <img
                src="/assets/img/agricgate-farm-logo-3.png"
                id="page-logo"
                alt="Picture of the author"
            />
        </a>

        <div class='ms-4 align-items-center justify-content-between w-100 navs-wrapper'>
            
            <div class='search-wrapper position-relative'>
                <button class="btn" id="searchBtn">
                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentFill"><path d="m15.89 14.653-3.793-3.794a.37.37 0 0 0-.266-.109h-.412A6.499 6.499 0 0 0 6.5 0C2.91 0 0 2.91 0 6.5a6.499 6.499 0 0 0 10.75 4.919v.412c0 .1.04.194.11.266l3.793 3.794a.375.375 0 0 0 .531 0l.707-.707a.375.375 0 0 0 0-.53ZM6.5 11.5c-2.763 0-5-2.238-5-5 0-2.763 2.237-5 5-5 2.762 0 5 2.237 5 5 0 2.762-2.238 5-5 5Z"></path></svg>
                </button>
                <input class='main-search-input' placeholder="{{ __('Search for courses...') }}"  id="mainSearchInput" />
                <div class="search-results-wrapper" id="search-results-wrapper">

                    <h6 class="mb-3">{{ __('Recent searches') }}</h6>

                    <input type="hidden" value="false" id="searchHistoryFetchStatus" />
                   
                </div>
            </div>

            <nav class='d-flex align-items-center'>
                <div class="dropdown" id="localeDropdownBtn">
            
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="setLocaleBtn" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M9 1C4.58875 1 1 4.58875 1 9C1 13.4113 4.58875 17 9 17C13.4113 17 17 13.4113 17 9C17 4.58875 13.4113 1 9 1ZM8.53125 4.92676C7.81812 4.89612 7.11218 4.7959 6.43811 4.63293C6.54578 4.37781 6.6626 4.13281 6.78857 3.90063C7.30542 2.94824 7.93994 2.27991 8.53125 2.03784V4.92676ZM8.53125 5.86499V8.53125H5.60339C5.64465 7.4906 5.82202 6.45752 6.11536 5.51782C6.8927 5.71362 7.70874 5.83215 8.53125 5.86499ZM8.53125 9.46875V12.135C7.70874 12.1678 6.8927 12.2864 6.11536 12.4822C5.82202 11.5425 5.64465 10.5094 5.60339 9.46875H8.53125ZM8.53125 13.0732V15.9622C7.93994 15.7201 7.30542 15.0518 6.78857 14.0994C6.6626 13.8672 6.54578 13.6222 6.43811 13.3671C7.11218 13.2041 7.81799 13.1039 8.53125 13.0732ZM9.46875 13.0732C10.1819 13.1039 10.8878 13.2041 11.5619 13.3671C11.4542 13.6222 11.3374 13.8672 11.2114 14.0994C10.6946 15.0518 10.0601 15.7201 9.46875 15.9622V13.0732ZM9.46875 12.135V9.46875H12.3966C12.3553 10.5094 12.178 11.5425 11.8846 12.4822C11.1073 12.2864 10.2913 12.1678 9.46875 12.135ZM9.46875 8.53125V5.86499C10.2913 5.83215 11.1073 5.71362 11.8846 5.51782C12.178 6.45752 12.3553 7.4906 12.3966 8.53125H9.46875ZM9.46875 4.92676V2.03784C10.0601 2.27991 10.6946 2.94824 11.2114 3.90063C11.3374 4.13281 11.4542 4.37781 11.5619 4.63293C10.8878 4.7959 10.1819 4.89612 9.46875 4.92676ZM12.0354 3.45349C11.8007 3.02087 11.5457 2.63953 11.2769 2.31421C12.2141 2.63428 13.0631 3.14636 13.7771 3.8031C13.3699 4.02124 12.931 4.21069 12.4694 4.36902C12.3384 4.0509 12.1936 3.74487 12.0354 3.45349ZM5.9646 3.45349C5.8064 3.74487 5.66162 4.0509 5.53064 4.36902C5.06897 4.21069 4.63013 4.02112 4.2229 3.8031C4.93689 3.14636 5.78589 2.63428 6.72314 2.31421C6.45435 2.63953 6.19946 3.02075 5.9646 3.45349ZM5.2135 5.25012C4.89355 6.27368 4.70544 7.38953 4.66492 8.53125H1.95349C2.05383 7.00769 2.63892 5.61438 3.5564 4.50525C4.06555 4.79724 4.62317 5.047 5.2135 5.25012ZM4.66492 9.46875C4.70544 10.6106 4.89355 11.7263 5.2135 12.7499C4.62317 12.953 4.06555 13.2028 3.5564 13.4948C2.63892 12.3856 2.05383 10.9923 1.95349 9.46875H4.66492ZM5.53064 13.631C5.66162 13.9491 5.8064 14.2551 5.9646 14.5465C6.19946 14.9791 6.45435 15.3605 6.72314 15.6858C5.78589 15.3657 4.93689 14.8536 4.22302 14.1969C4.63 13.9789 5.06897 13.7893 5.53064 13.631ZM12.0354 14.5465C12.1936 14.2551 12.3384 13.9491 12.4694 13.631C12.931 13.7893 13.3699 13.9789 13.7771 14.1969C13.0631 14.8536 12.2141 15.3657 11.2769 15.6858C11.5457 15.3605 11.8005 14.9792 12.0354 14.5465ZM12.7865 12.7499C13.1064 11.7263 13.2946 10.6105 13.3351 9.46875H16.0465C15.9462 10.9923 15.3611 12.3856 14.4436 13.4948C13.9344 13.2028 13.3768 12.953 12.7865 12.7499ZM13.3351 8.53125C13.2946 7.3894 13.1064 6.27368 12.7865 5.25012C13.3768 5.047 13.9344 4.79724 14.4436 4.50525C15.3611 5.61438 15.9462 7.00769 16.0465 8.53125H13.3351Z" stroke-width="0.2"></path></svg>
                        <!-- <img src="{{ asset('assets/img/globe.png') }}" alt="globe" class="me-2" /> -->

                        @if(App::getLocale() == 'en') 

                            English
                        
                        @endif

                        @if(App::getLocale() == 'tw') 

                            Twi

                        @endif

                        @if(App::getLocale() == 'fr') 

                            Français

                        @endif

                        @if(App::getLocale() == 'ha') 

                            Hausa

                        @endif


                    </button>
                    <ul class="dropdown-menu pb-4">
                        <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'en' ] ) }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'fr' ] ) }}">Français</a></li>
                        <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'tw' ] ) }}">Twi</a></li>
                        <li><a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'ha' ] ) }}">Hausa</a></li>
                    </ul>
                </div>
                <a href="{{ route('e-commerce') }}" class="nav-link">{{ __('E-Commerce') }}</a>
                <a href="{{ route('blogs-page') }}" class="nav-link">{{ __('News') }}</a>
                <!-- <a href="{{ route('explore') }}" class='me-2'>{{ __('Explore') }}</a> -->
                <a href="{{ route('donate.create-charge') }}" class="nav-link">{{ __('Donate') }}</a>

                @auth
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_img_url }}" class="me-2"/>
                            <svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-65" class="css-awzoag"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 14.293L1.354 5.646l-.708.708L10 15.707l9.354-9.353-.707-.708L10 14.293z" fill="currentColor"></path></svg>
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
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('Sign in') }}</a>
                    <button class='btn btn-outline-success' data-bs-toggle="modal" data-bs-target="#registerModal">{{ __('Join') }}</button>
                @endguest

            </nav>

        </div>

        <div class="navs-wrapper-mobile ms-auto">

            <button class="btn" id="showSearchBtn">
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

    </div>


</header>