@extends('layouts.main-layout')

@section('main-content')

    @php 

        $url_parameter = Route::current()->parameter('tab');
    
    @endphp

    <main class="main-content pt-4 account">
        <div class="account-bgImg">
            <div class="row g-0 h-100">
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </div>
        <section>
            <div class="container-xxl">
                <h3 class='fw-bold text-black mb-4'>{{ __('Account') }}</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ __($error) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ __(session('status')) }}
                    </div>
                @endif

                <div class="row mb-5 pb-5">
                    <div class="col-lg-6 col-12">
                        <div class="d-flex flex-column card profile-card">
                            <div class="position-relative profile-img-wrapper">

                                <img src="{{ Auth::user()->profile_img_url }}" alt="human" id="profileImg"/>

                                <div class="profile-img-upload-wrapper">
                                    
                                    <form action="/account" method="post" id="profileImgUploadForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" accept="image/*" name="file" class="d-none" id="updateProfileImgInput" />
                                    </form>

                                    <button class="btn btn-outline-light" id="updateProfileImgBtn">{{ __('Change') }}</button>
                                </div>

                            </div>
                            <h5>{{ Auth::user()->username }}</h5>
                            <div class="w-100">
                                <p>{{ __('Name') }}: {{ Auth::user()->name }}</p>
                                <p>{{ __('Email') }}: {{ Auth::user()->email }}</p>
                                <p>{{ __('Joined on') }}: {{ format_date(Auth::user()->created_at) }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <a id="account-navs" href="#accountTab"></a>

                <ul class="nav nav-tabs" id="accountTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="history-tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="true">{{ __('History') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bookmarks-tab" data-bs-target="#bookmarks-tab-pane" type="button" role="tab" aria-controls="bookmarks-tab-pane" aria-selected="false">{{ __('Bookmarks') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-target="#settings-tab-pane" type="button" role="tab" aria-controls="settings-tab-pane" aria-selected="false">{{ __('Settings') }}</button>
                    </li>
                </ul>
            
                <div class="tab-content" id="accountTabContent">

                    <div class="tab-pane fade show active" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gx-5 gy-5 py-5">


                            @foreach($histories as $history)

                                    @if( $history->course->lessons_count == $history->course->complete_lessons_count  )

                                       <a href="{{ route('course-page', ['course_id' => $history->course_id ] ) }}" class="col">
                                            <div class='course-card-wrapper'>
                                                <div class='course-img'>
                                                    <img src="{{ $history->course->featured_img_url }}" alt="snail" />
                                                </div>
                                                <div class='card-footer d-flex flex-column align-items-end'>
                                                    <div class='course-details'>
                                                        <p>{{ translate($history->course->title) }}</p>
                                                        <p>{{ translate($history->course->description) }}</p>
                                                    </div>

                                                    <button class='btn btn-outline-success w-auto'>{{ __('Review Course') }}</button>

                                                </div>
                                            </div>
                                        </a>
                                    
                                    @elseif($history->course_progress)

                                        <a href="{{ route('lesson-page', ['course_id' => $history->course_id, 
                                                    'lesson_id' => $history->course_progress->lesson_id ] ) 
                                                }}" 
                                            class="col">
                                                <div class='course-card-wrapper'>
                                                    <div class='course-img'>
                                                        <img src="{{ $history->course->featured_img_url }}" alt="snail" />
                                                    </div>
                                                    <div class='card-footer d-flex flex-column align-items-end'>
                                                        <div class='course-details'>
                                                            <p>{{ translate($history->course->title) }}</p>
                                                            <p>{{ translate($history->course->description) }}</p>
                                                        </div>

                                                        <button class='btn btn-outline-success w-auto'>{{ __('Continue Learning') }}</button>

                                                    </div>
                                                </div>
                                        </a>

                                    @else 

                                        <a href="{{ route('course-page', ['course_id' => $history->course->id ] ) }}" class="col">
                                            <div class='course-card-wrapper'>
                                                <div class='course-img'>
                                                    <img src="{{ $history->course->featured_img_url }}" alt="snail" />
                                                </div>
                                                <div class='card-footer d-flex flex-column align-items-end'>
                                                    <div class='course-details'>
                                                        <p>{{ translate($history->course->title) }}</p>
                                                        <p>{{ translate($history->course->description) }}</p>
                                                    </div>
                                                    
                                                    <button class='btn btn-outline-success w-auto'>{{ __('Start Learning') }}</button>
                            
                                                </div>
                                            </div>
                                        </a>

                                    @endif


                            @endforeach

                        </div>
                    </div>

                    <div class="tab-pane fade" id="bookmarks-tab-pane" role="tabpanel" aria-labelledby="bookmarks-tab" tabindex="0">
                        
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gx-5 gy-5 py-5">

                            @foreach($favorite_courses as $favorite_course)

                                @if($favorite_course->course->lessons_count == 
                                                $favorite_course->course->complete_lessons_count)

                                    <a href="{{ route('course-page', [ 'course_id' => $favorite_course->course_id ]) }}" class="col">
                                        <div class='course-card-wrapper'>
                                            <div class='course-img'>
                                                <img src="{{ $favorite_course->course->featured_img_url }}" alt="snail" />
                                            </div>
                                            <div class='card-footer d-flex flex-column align-items-end'>
                                                <div class='course-details'>
                                                    <p>{{ translate($favorite_course->course->title) }}</p>
                                                    <p>{{ translate($favorite_course->course->description) }}</p>
                                                </div>
                                                
                                                    <button class='btn btn-outline-success w-auto'>{{ __('Review Course') }}</button>
                        
                                            </div>
                                        </div>
                                    </a>

                                @elseif($favorite_course->course->course_progress)

                                    <a href="{{ route('lesson-page', ['course_id' => $favorite_course->course_id, 
                                        'lesson_id' => $favorite_course->course->course_progress->lesson_id ]) }}" class="col">
                                        <div class='course-card-wrapper'>
                                            <div class='course-img'>
                                                <img src="{{ $favorite_course->course->featured_img_url }}" alt="snail" />
                                            </div>
                                            <div class='card-footer d-flex flex-column align-items-end'>
                                                <div class='course-details'>
                                                    <p>{{ translate($favorite_course->course->title) }}</p>
                                                    <p>{{ translate($favorite_course->course->description) }}</p>
                                                </div>

                                                <button class='btn btn-outline-success w-auto'>{{ __('Continue Learning') }}</button>
                        
                                            </div>
                                        </div>
                                    </a>

                                @else 

                                    <a href="{{ route('course-page', ['course_id' => $favorite_course->course_id ]) }}" class="col">
                                        <div class='course-card-wrapper'>
                                            <div class='course-img'>
                                                <img src="{{ $favorite_course->course->featured_img_url }}" alt="snail" />
                                            </div>
                                            <div class='card-footer d-flex flex-column align-items-end'>
                                                <div class='course-details'>
                                                    <p>{{ translate($favorite_course->course->title) }}</p>
                                                    <p>{{ translate($favorite_course->course->description) }}</p>
                                                </div>
                                                
                                                <button class='btn btn-outline-success w-auto'>{{ __('Start Learning') }}</button>
                        
                                            </div>
                                        </div>
                                    </a>

                                @endif

                            @endforeach

                        </div>

                    </div>

                    <div class="tab-pane fade" id="settings-tab-pane" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">
                        <div class="py-5">
                            <h3 class='mb-4 fw-bold text-black ms-3 mb-5'>{{ __('Update account') }}</h3>
                            
                            <form action="/account" method="post">
                                    @method('PUT')
                                    @csrf
                                <div class="row g-5 g-lg-5 mb-5">
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">{{ __('Username') }}</label>
                                        <input type="text" class="form-control" name="username" placeholder="{{ __('Username') }}"  value="{{ Auth::user()->username }}" aria-label="Username">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="text" class="form-control" name="email" placeholder="{{ __('Email') }}"  value="{{ Auth::user()->email }}"  aria-label="Email" disabled>
                                            @if(!Auth::user()->email_verified_at)
                                                <div class="alert alert-warning mt-3">
                                                    {{ __('Email not verified.') }} <a href="{{ route('verification.notice') }}"><strong>{{ __('Verify email.') }}</strong></a>
                                                </div>
                                               
                                            @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" value="" aria-label="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirmPassword" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="{{ __('Confirm Password') }}" value="" aria-label="Confirm Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success d-table ms-auto">{{ __('Save') }}</button>

                            </form>

                        </div>
                    </div>

                </div>

                

            </div>
        </section>

        <div class="spacer"></div>

    </main>

@endsection

@section('scripts')

    <script>

        const urlParameter = <?php echo json_encode($url_parameter)  ?>;
        const triggerTabList = document.querySelectorAll('#accountTab button');
        const url_hash = new URL(location.href).hash;
        
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', event => {
                event.preventDefault()
                tabTrigger.show()
            })

        });

       (function() {

            if(url_hash) {

                var accountsNavs = document.getElementById('account-navs');
                accountsNavs.scrollIntoView();
                
            }

            if(urlParameter == 'settings') {

                const triggerEl = document.querySelector('#accountTab button[data-bs-target="#settings-tab-pane"]')
                bootstrap.Tab.getInstance(triggerEl).show();
                $('html').css('scroll-behavior', 'auto');
                location.hash = "#account-navs";

            }

            if(urlParameter == 'history') {

                const triggerEl = document.querySelector('#accountTab button[data-bs-target="#history-tab-pane"]')
                bootstrap.Tab.getInstance(triggerEl).show();
                $('html').css('scroll-behavior', 'auto');
                location.hash = "#account-navs";

            }

            else if(urlParameter == 'bookmarks') {

                const triggerEl = document.querySelector('#accountTab button[data-bs-target="#bookmarks-tab-pane"]')
                bootstrap.Tab.getInstance(triggerEl).show();
                $('html').css('scroll-behavior', 'auto');
                location.hash = "#account-navs";

            }

       })();


    </script>

@endsection
