<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Course for farming">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Trisolace | Learn everything about farming</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/theme.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/layouts/video.min.css" />
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <link href="/assets/css/global.css" rel="stylesheet" />

    </head>

    <body class="antialiased">


        @include('includes.header')

        @yield('main-content')

        @include('includes.footer')

        <!-- Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog px-4">
                <div class="modal-content">
                    <div class="modal-body mb-5 px-5">
                        <h5 class="text-center text-black mt-4 mb-5">Register</h5>
                        <form action="/register" method="post">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput3" placeholder="Name">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" name="username" id="exampleFormControlInput4" placeholder="Username">
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput5" placeholder="Email">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" name="password" id="exampleFormControlInput6" placeholder="Password">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" name="password_confirmation" id="exampleFormControlInput7" placeholder="Confirm Password">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog px-4">
                <div class="modal-content">
                    <div class="modal-body mb-5 px-5">
                        <h5 class="text-center text-black mt-4 mb-5">Login</h5>
                        <form action="/login" method="post">
                            @csrf
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" name="password" id="exampleFormControlInput2" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/cdn/with-layouts/vidstack.js" type="module"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/ui.js') }}"></script>
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
                    addFavorite: "{{ route('add-favorite') }}",
                    askQuestion: "{{ route('ask-question') }}"
                }
            }

            let commonObj = new commonClass(ext);

            $(ext.jsId.addToFavoriteBtn).on('click', () => {

                commonObj.addToFavorite();

            });

            $(ext.jsId.askQuestionBtn).on('click', () => {

                commonObj.askQuestion();

            });

            $(ext.jsId.searchBtn).on('click', () => {

                var searchQuery = $(ext.jsId.mainSearchInput).val();

                var route =  "{{ route('search') }}?search_query=" + searchQuery;

                commonObj.setSearchHistory('searchHistory', searchQuery);

                location.href = route;

            });

        </script>

        @yield('scripts')

    </body>

</html>