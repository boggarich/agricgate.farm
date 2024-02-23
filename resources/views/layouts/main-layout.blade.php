<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Course for farming">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Agricgate.farm | Learn everything about farming</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/theme.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/layouts/video.min.css" />
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet" />

    </head>

    <body class="antialiased">

        @if ($errors->any())

            <div class="alert user-login-alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ __($error) }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        @include('includes.header')

        @yield('main-content')

        @include('includes.footer')

        
        <nav class="mobile-navs">
            <div class="container">

                <ul class="">
                    <li><a href="{{ route('explore') }}">Explore</a></li>
                    <li><a href="{{ route('donate.create-charge') }}">{{ __('Donate') }}</a></li>

                    @auth
                        <li><a href="{{ route('account') }}">Account</a></li>
                        <li><a href="{{ route('account', [ 'tab' => 'bookmarks' ]) }}">My Bookmarks</a></li>
                        <li><a href="{{ route('account', [ 'tab' => 'history' ]) }}">History</a></li>
                        <hr class="mb-0">
                        <li><a class="text-center pt-0 ps-3" href="/logout">Log out</a></li>
                    @endauth

                    @guest
                        <button class='btn btn-outline-success w-100 mb-4 mt-5' data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                        <button class='btn btn-success w-100' data-bs-toggle="modal" data-bs-target="#registerModal">Sign up</button>
                    @endguest

                    <li><h3 class="mt-4">Choose language</h3></li>
                    <li><a class="" href="{{ route('set-locale', ['locale' => 'en' ] ) }}"><img src="{{ asset('assets/img/britain-flag.png') }}" alt="Britain flag" class="me-2"/>English</a></li>
                    <li><a class="" href="{{ route('set-locale', ['locale' => 'tw' ] ) }}"><img src="{{ asset('assets/img/ghana-flag.png') }}" alt="Ghana flag" class="me-2"/>Twi</a></li>
                    <li><a class="" href="{{ route('set-locale', ['locale' => 'fr' ] ) }}"><img src="{{ asset('assets/img/france-flag.png') }}" alt="France flag" class="me-2"/>French</a></li>

                </ul>

            </div>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog px-4">
                <div class="modal-content">
                    <div class="modal-body mb-4 px-5">
                        <h5 class="text-center text-black mt-4 mb-5">{{ __('Register') }}</h5>
                        <form action="/register" method="post">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput3" placeholder="{{ __('Name') }}">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" name="username" id="exampleFormControlInput4" placeholder="{{ __('Username') }}">
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput5" placeholder="{{ __('Email') }}">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" name="password" id="exampleFormControlInput6" placeholder="{{ __('Password') }}">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" name="password_confirmation" id="exampleFormControlInput7" placeholder="{{ __('Confirm Password') }}">
                            </div>
                            <button class="btn btn-success w-100" type="submit">{{ __('Register') }}</button>
                        </form>
                        <button class="mt-1 text-center mx-auto d-table btn mb-0 shadow-none text-small" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __("Already have an account? Login.") }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog px-4">
                <div class="modal-content">
                    <div class="modal-body mb-4 px-5">
                        <h5 class="text-center text-black mt-4 mb-5">{{ __('Login') }}</h5>
                        <form action="/login" method="post">
                            @csrf
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="{{ __('Email') }}">
                            </div>
                            <div class="mb-2">
                                <input type="password" class="form-control" name="password" id="exampleFormControlInput2" placeholder="{{ __('Password') }}">
                            </div>
                            <div class="mb-4">
                                <a href="{{ route('password.request') }}" class="ms-auto d-table">{{ __('Forgot password') }}?</a>
                            </div>
                            <button type="submit" class="btn btn-success w-100">{{ __('Login') }}</button>
                        </form>
                        <button class="mt-1 text-center mx-auto d-table btn mb-0 shadow-none text-small" data-bs-toggle="modal" data-bs-target="#registerModal">{{ __("Don't have an account yet? Register.") }}</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/cdn/with-layouts/vidstack.js" type="module"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="{{ asset('assets/js/ui.js') }}" defer></script>
        <script src="{{ asset('assets/js/common.js') }}"></script>

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
        </script>

        <script>

            let ext = {
                jsId: {
                    paymentVerificationFailedHTML: '#paymentVerificationFailedHTML',
                    paymentVerifiedHTML: '#paymentVerifiedHTML',
                    paymentVerificationHTML: '#paymentVerificationHTML',
                    profileImgUploadForm: '#profileImgUploadForm',
                    profileImg: '#profileImg',
                    updateProfileImgInput: '#updateProfileImgInput',
                    updateProfileImgBtn: '#updateProfileImgBtn',
                    searchHistoryFetchStatus: '#searchHistoryFetchStatus',
                    searchResultsWrapper: '#search-results-wrapper',
                    mainSearchInput: '#mainSearchInput',
                    addToFavoriteBtn: '#addToFavoriteBtn',
                    askQuestionBtn: '#askQuestionBtn',
                    questionsAndAnswersWrapper: '#questionsAndAnswersWrapper',
                    askQuestionBtn: '#askQuestionBtn',
                    courseId: '#courseId',
                    question: '#question',
                    searchBtn: '#searchBtn'
                },
                classes: {
                    deleteRecentSearchBtn: '.delete-recent-search',
                    recentSearch: '.recent-search'
                },
                url: {
                    verifyPayment: "{{ route('donate.verify') }}",
                    addFavorite: "{{ route('add-favorite') }}",
                    askQuestion: "{{ route('ask-question') }}"
                }
            }

            let commonObj = new commonClass(ext);

            $(ext.jsId.addToFavoriteBtn).on('click', () => {

                commonObj.addToFavorite();

            });

            $(ext.jsId.searchBtn).on('click', () => {

                var searchQuery = $(ext.jsId.mainSearchInput).val();

                var route =  "{{ route('search') }}?search_query=" + searchQuery;

                commonObj.setSearchHistory('searchHistory', searchQuery);

                location.href = route;

            });

        </script>

        @yield('scripts')

        <div class="backdrop-mobile"></div>

    </body>

</html>