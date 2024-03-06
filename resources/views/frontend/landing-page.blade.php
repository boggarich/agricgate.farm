@extends('layouts.main-layout')

@section('main-content')


    <main class="main-content overflow-hidden">

        <section>
            <!-- Slider main container -->
            <div class="swiper page-hero">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="text-bg-gradient gradient-1"></div>
                        <div class='position-relative'>
                            <img src='/assets/img/closeup-of-snail-eating-lettuce.jpg' alt="snail-feeding"/>
                            <div class='container-xxl'>
                                <h1 class='page-hero-header'>{{ __('Join our community to access') }} <span class="accent-color font-domaine"><i>{{ __('free') }}</i></span> {{ __('e-learning, market your produce, and connect with experts.') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-bg-gradient gradient-1"></div>
                        <div class='position-relative'>
                            <img src='/assets/img/media12-1-scaled.jpg' alt="snail-feeding"/>
                            <div class='container-xxl'>
                                <h1 class='page-hero-header'>{{ __('Learn sustainable farming to increase yield and protect the environment.') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-bg-gradient gradient-1"></div>
                        <div class='position-relative'>
                            <img src='/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg' alt="snail-feeding"/>
                            <div class='container-xxl'>
                                <h1 class='page-hero-header'>{{ __('Sell your produce directly to buyers, no middlemen, better profits.') }}</h1>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

            </div>

        </section>

        <div class='spacer'></div>

        <section class="about-us">

            <div class="container-xxl">
                <div class="row">

                    <div class="col-md-6">
                        <div class="d-flex flex-column justify-content-center h-100">
                        <h3 class='page-header'>{{ __('About us') }}</h3>
                            <p>
                            Agricgate seeks to offer practical virtual
                            agriculture training to African youth; with an E-commerce 
                            platform to sell products created through the farms' set-up.
                            This is to help equip and excite the interest of these young ones in 
                            farming and at the same 
                            time resourcing trainees to be able to start their
                            farm and or be groomed into farm managers.
                            </p>
                            <a href="{{ route('who-we-are') }}" class="btn btn-primary">Learn more</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <img src="{{ asset('assets/img/8641485.jpg') }}" class="img-fluid"/>
                    </div>
                
                </div>
            </div>

        </section>

        <div class='spacer'></div>

        <section class="our-vision-mission">

            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="d-flex flex-column justify-content-center h-100">
                        <h3 class='page-header'>{{ __('Our') }} {{ __('mission & vision') }}</h3>
                        <div class="d-flex align-items-center mb-3">
                                <svg width="24" height="24" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#B1ABFF"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.203.432a1.891 1.891 0 0 0-2.406 0l-1.113.912a1.904 1.904 0 0 1-.783.384l-1.395.318c-.88.2-1.503.997-1.5 1.915l.007 1.456c0 .299-.065.594-.194.863L.194 7.59a1.978 1.978 0 0 0 .535 2.388l1.12.903c.231.185.417.422.543.692l.615 1.314a1.908 1.908 0 0 0 2.166 1.063l1.392-.33c.286-.068.584-.068.87 0l1.392.33a1.908 1.908 0 0 0 2.166-1.063l.615-1.314c.126-.27.312-.507.542-.692l1.121-.903c.707-.57.93-1.563.535-2.388l-.625-1.309a1.983 1.983 0 0 1-.194-.863l.006-1.456a1.947 1.947 0 0 0-1.5-1.915L10.1 1.728a1.904 1.904 0 0 1-.784-.384L8.203.432Zm2.184 5.883a.742.742 0 0 0 0-1.036.71.71 0 0 0-1.018 0L6.565 8.135 5.095 6.73a.71.71 0 0 0-1.018.032.742.742 0 0 0 .032 1.036L6.088 9.69a.71.71 0 0 0 1.001-.016l3.297-3.359Z"></path></svg>
                                <div>
                                    <p class="mb-0"><strong>Virtual Online</strong></p>
                                    <p class="mb-0">To build a virtual online training platform that will offer training to youths in the African region</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <svg width="24" height="24" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#B1ABFF"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.203.432a1.891 1.891 0 0 0-2.406 0l-1.113.912a1.904 1.904 0 0 1-.783.384l-1.395.318c-.88.2-1.503.997-1.5 1.915l.007 1.456c0 .299-.065.594-.194.863L.194 7.59a1.978 1.978 0 0 0 .535 2.388l1.12.903c.231.185.417.422.543.692l.615 1.314a1.908 1.908 0 0 0 2.166 1.063l1.392-.33c.286-.068.584-.068.87 0l1.392.33a1.908 1.908 0 0 0 2.166-1.063l.615-1.314c.126-.27.312-.507.542-.692l1.121-.903c.707-.57.93-1.563.535-2.388l-.625-1.309a1.983 1.983 0 0 1-.194-.863l.006-1.456a1.947 1.947 0 0 0-1.5-1.915L10.1 1.728a1.904 1.904 0 0 1-.784-.384L8.203.432Zm2.184 5.883a.742.742 0 0 0 0-1.036.71.71 0 0 0-1.018 0L6.565 8.135 5.095 6.73a.71.71 0 0 0-1.018.032.742.742 0 0 0 .032 1.036L6.088 9.69a.71.71 0 0 0 1.001-.016l3.297-3.359Z"></path></svg>
                                <div>
                                    <p class="mb-0"><strong>Practical Training</strong></p>
                                    <p class="mb-0">To offer online practical training to African youths to stir their interest in farming</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <svg width="24" height="24" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#B1ABFF"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.203.432a1.891 1.891 0 0 0-2.406 0l-1.113.912a1.904 1.904 0 0 1-.783.384l-1.395.318c-.88.2-1.503.997-1.5 1.915l.007 1.456c0 .299-.065.594-.194.863L.194 7.59a1.978 1.978 0 0 0 .535 2.388l1.12.903c.231.185.417.422.543.692l.615 1.314a1.908 1.908 0 0 0 2.166 1.063l1.392-.33c.286-.068.584-.068.87 0l1.392.33a1.908 1.908 0 0 0 2.166-1.063l.615-1.314c.126-.27.312-.507.542-.692l1.121-.903c.707-.57.93-1.563.535-2.388l-.625-1.309a1.983 1.983 0 0 1-.194-.863l.006-1.456a1.947 1.947 0 0 0-1.5-1.915L10.1 1.728a1.904 1.904 0 0 1-.784-.384L8.203.432Zm2.184 5.883a.742.742 0 0 0 0-1.036.71.71 0 0 0-1.018 0L6.565 8.135 5.095 6.73a.71.71 0 0 0-1.018.032.742.742 0 0 0 .032 1.036L6.088 9.69a.71.71 0 0 0 1.001-.016l3.297-3.359Z"></path></svg>
                                <div>
                                    <p class="mb-0"><strong>Yearly Resource</strong></p>
                                    <p class="mb-0">To resource yearly 500 youths to be able to start their own farms</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <svg width="24" height="24" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#B1ABFF"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.203.432a1.891 1.891 0 0 0-2.406 0l-1.113.912a1.904 1.904 0 0 1-.783.384l-1.395.318c-.88.2-1.503.997-1.5 1.915l.007 1.456c0 .299-.065.594-.194.863L.194 7.59a1.978 1.978 0 0 0 .535 2.388l1.12.903c.231.185.417.422.543.692l.615 1.314a1.908 1.908 0 0 0 2.166 1.063l1.392-.33c.286-.068.584-.068.87 0l1.392.33a1.908 1.908 0 0 0 2.166-1.063l.615-1.314c.126-.27.312-.507.542-.692l1.121-.903c.707-.57.93-1.563.535-2.388l-.625-1.309a1.983 1.983 0 0 1-.194-.863l.006-1.456a1.947 1.947 0 0 0-1.5-1.915L10.1 1.728a1.904 1.904 0 0 1-.784-.384L8.203.432Zm2.184 5.883a.742.742 0 0 0 0-1.036.71.71 0 0 0-1.018 0L6.565 8.135 5.095 6.73a.71.71 0 0 0-1.018.032.742.742 0 0 0 .032 1.036L6.088 9.69a.71.71 0 0 0 1.001-.016l3.297-3.359Z"></path></svg>
                                <div>
                                    <p class="mb-0"><strong>Internships</strong></p>
                                    <p class="mb-0">To connect 2,000 youths yearly to farms through internships leading to employment</p>
                                </div>
                            </div>
                            <a href="{{ route('our-mission') }}" class="btn btn-light">Learn more</a>

                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <img src="{{ asset('assets/img/UNDP_GH_Snails_Felix_2.jpg') }}" class="img-fluid"/>
                    </div>
                
                </div>
            </div>

        </section>

        <div class='spacer'></div>

        <section class="features">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-md-3 d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('assets/img/3974104.jpg') }}" class="img-fluid"/>
                        <h5><strong>E-Learning</strong></h5>
                        <p class="text-muted">We provide an e-learning platform to hone your craft and adopt new skills.</p>
                    </div>
                    <div class="col-md-3 d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('assets/img/Wavy_Bus-17_Single-06.jpg') }}" class="img-fluid"/>
                        <h5><strong>Marketplace</strong></h5>
                        <p class="text-muted">We provide a platform to link your products and produces directly to customers online therefore increasing your revenue generation.</p>
                    </div>
                    <div class="col-md-3 d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('assets/img/3974104.jpg') }}" class="img-fluid"/>
                        <h5><strong>Financial Tools</strong></h5>
                        <p class="text-muted">We provide you with the power of financial management to be able to take inform decisions.</p>
                    </div>
                    <div class="col-md-3 d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('assets/img/3974104.jpg') }}" class="img-fluid"/>
                        <h5><strong>Community Forum</strong></h5>
                        <p class="text-muted">We encourage collaboration through our community forum where customers get solutions to their problems through peer-to-peer interactions.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class='spacer'></div>

        <section class="how-it-works">
            <div class="container-xxl">
                <h6 class="text-white text-uppercase text-center"><strong>3 easy steps</strong></h6>
                <h3 class='page-header text-center'>{{ __('How it works') }}</h3>
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="svg-container">
                            <img src="{{ asset('assets/img/register.png') }}" class="img-fluid" />
                            <div class="step-number-container"><h3><strong>01</strong></h3></div>
                        </div>
                        <h5><strong>Register</strong></h5>
                    </div>
                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="svg-container">
                            <img src="{{ asset('assets/img/course.png') }}" class="img-fluid" />
                            <div class="step-number-container"><h3><strong>02</strong></h3></div>
                        </div>
                        <h5><strong>Select a course</strong></h5>
                    </div>
                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="svg-container">
                            <img src="{{ asset('assets/img/development.png') }}" class="img-fluid" />
                            <div class="step-number-container"><h3><strong>03</strong></h3></div>
                        </div>
                        <h5><strong>Start learning & <br>development</strong></h5>
                    </div>
                </div>
            </div>
        </section>

        <div class='spacer'></div>

        @if($featured_courses->isNotEmpty())

            <section>
            <div class='container-xxl'>

                <div class='position-relative featured-courses-wrapper d-flex flex-column'>
                        
                    <h3 class='page-header'>{{ __('Featured courses') }}</h3>

                        <div class='swiper featured-courses'>

                            <div class="swiper-wrapper">

                                @if($featured_courses)

                                    @foreach($featured_courses as $featured_course)

                                        <div class="swiper-slide">
                                            <a href="/course/{{ $featured_course->course->id }}">
                                                <div class='course-card-wrapper'>
                                                    <div class='course-img'>
                                                        <img src="{{ $featured_course->course->featured_img_url }}" alt="snail" />
                                                    </div>
                                                    <div class='card-footer d-flex flex-column align-items-end'>
                                                        <div class='course-details'>
                                                            <p>{{ $featured_course->course->title }}</p>
                                                            <p>{{ $featured_course->course->description }}</p>
                                                        </div>
                                                        
                                                        <button class='btn btn-outline-success w-auto'>{{ __('View Course') }}</button>
                                
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    @endforeach

                                @endif

                            </div>

                        </div>

                        <div class='swiper-button-next'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33" fill="none">
                            <path fillRule="evenodd" clipRule="evenodd" d="M0.425707 0.371485C0.560232 0.25373 0.720043 0.160303 0.895986 0.096558C1.07193 0.0328126 1.26055 0 1.45103 0C1.64152 0 1.83014 0.0328126 2.00608 0.096558C2.18203 0.160303 2.34184 0.25373 2.47636 0.371485L19.8548 15.5451C19.9896 15.6625 20.0966 15.8021 20.1697 15.9557C20.2427 16.1093 20.2802 16.274 20.2802 16.4403C20.2802 16.6067 20.2427 16.7713 20.1697 16.925C20.0966 17.0786 19.9896 17.2181 19.8548 17.3356L2.47636 32.5092C2.20443 32.7466 1.83561 32.88 1.45103 32.88C1.06646 32.88 0.697641 32.7466 0.425707 32.5092C0.153773 32.2717 0.00100237 31.9497 0.00100237 31.6139C0.00100237 31.2782 0.153773 30.9561 0.425707 30.7187L16.7817 16.4403L0.425707 2.16197C0.290841 2.04451 0.183839 1.90498 0.110831 1.75136C0.0378232 1.59774 0.000244141 1.43305 0.000244141 1.26673C0.000244141 1.10041 0.0378232 0.935719 0.110831 0.782099C0.183839 0.628478 0.290841 0.488943 0.425707 0.371485Z" fill="black"/>
                            </svg>
                        </div>
                        <div class='swiper-button-prev'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33" fill="none">
                            <path fillRule="evenodd" clipRule="evenodd" d="M19.8545 0.371485C19.9894 0.488943 20.0964 0.628478 20.1694 0.782099C20.2424 0.935719 20.28 1.10041 20.28 1.26673C20.28 1.43305 20.2424 1.59774 20.1694 1.75136C20.0964 1.90498 19.9894 2.04451 19.8545 2.16197L3.49855 16.4403L19.8545 30.7187C20.1265 30.9561 20.2792 31.2782 20.2792 31.6139C20.2792 31.9497 20.1265 32.2717 19.8545 32.5092C19.5826 32.7466 19.2138 32.88 18.8292 32.88C18.4446 32.88 18.0758 32.7466 17.8039 32.5092L0.425463 17.3356C0.290597 17.2181 0.183595 17.0786 0.110587 16.925C0.037579 16.7713 0 16.6067 0 16.4403C0 16.274 0.037579 16.1093 0.110587 15.9557C0.183595 15.8021 0.290597 15.6625 0.425463 15.5451L17.8039 0.371485C17.9384 0.25373 18.0982 0.160303 18.2742 0.096558C18.4501 0.0328126 18.6387 0 18.8292 0C19.0197 0 19.2083 0.0328126 19.3843 0.096558C19.5602 0.160303 19.72 0.25373 19.8545 0.371485Z" fill="black"/>
                            </svg>
                        </div>

                </div>
                
            </div>
            </section>

        @endif

        <div class='spacer'></div>

        <section>
        <div class='container-xxl flex-column'>

            <div class='position-relative explore-by-category-wrapper'>
                <h3 class='page-header'>{{ __('Explore by category') }}</h3>
                <div class='swiper explore-by-category'>

                <div class="swiper-wrapper">

                    @foreach($categories as $category)
                    
                        <div class="swiper-slide">
                            <a href="/explore/{{ $category->id }}">
                                <div class='card-overlay shadow-none'>

                                    <div class='overlay-img'>
                                        <img src="{{ $category->featured_img_url }}" />
                                    </div>

                                    <div class='overlay-content'>
                                        <h3 class='page-header'>{{ $category->title }}</h3>
                                    </div>

                                </div>
                            </a>
                        </div>

                    @endforeach


                </div>


                </div>
                <div class='swiper-button-next'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33" fill="none">
                    <path fillRule="evenodd" clipRule="evenodd" d="M0.425707 0.371485C0.560232 0.25373 0.720043 0.160303 0.895986 0.096558C1.07193 0.0328126 1.26055 0 1.45103 0C1.64152 0 1.83014 0.0328126 2.00608 0.096558C2.18203 0.160303 2.34184 0.25373 2.47636 0.371485L19.8548 15.5451C19.9896 15.6625 20.0966 15.8021 20.1697 15.9557C20.2427 16.1093 20.2802 16.274 20.2802 16.4403C20.2802 16.6067 20.2427 16.7713 20.1697 16.925C20.0966 17.0786 19.9896 17.2181 19.8548 17.3356L2.47636 32.5092C2.20443 32.7466 1.83561 32.88 1.45103 32.88C1.06646 32.88 0.697641 32.7466 0.425707 32.5092C0.153773 32.2717 0.00100237 31.9497 0.00100237 31.6139C0.00100237 31.2782 0.153773 30.9561 0.425707 30.7187L16.7817 16.4403L0.425707 2.16197C0.290841 2.04451 0.183839 1.90498 0.110831 1.75136C0.0378232 1.59774 0.000244141 1.43305 0.000244141 1.26673C0.000244141 1.10041 0.0378232 0.935719 0.110831 0.782099C0.183839 0.628478 0.290841 0.488943 0.425707 0.371485Z" fill="black"/>
                    </svg>
                </div>
                <div class='swiper-button-prev'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33" fill="none">
                    <path fillRule="evenodd" clipRule="evenodd" d="M19.8545 0.371485C19.9894 0.488943 20.0964 0.628478 20.1694 0.782099C20.2424 0.935719 20.28 1.10041 20.28 1.26673C20.28 1.43305 20.2424 1.59774 20.1694 1.75136C20.0964 1.90498 19.9894 2.04451 19.8545 2.16197L3.49855 16.4403L19.8545 30.7187C20.1265 30.9561 20.2792 31.2782 20.2792 31.6139C20.2792 31.9497 20.1265 32.2717 19.8545 32.5092C19.5826 32.7466 19.2138 32.88 18.8292 32.88C18.4446 32.88 18.0758 32.7466 17.8039 32.5092L0.425463 17.3356C0.290597 17.2181 0.183595 17.0786 0.110587 16.925C0.037579 16.7713 0 16.6067 0 16.4403C0 16.274 0.037579 16.1093 0.110587 15.9557C0.183595 15.8021 0.290597 15.6625 0.425463 15.5451L17.8039 0.371485C17.9384 0.25373 18.0982 0.160303 18.2742 0.096558C18.4501 0.0328126 18.6387 0 18.8292 0C19.0197 0 19.2083 0.0328126 19.3843 0.096558C19.5602 0.160303 19.72 0.25373 19.8545 0.371485Z" fill="black"/>
                    </svg>
                </div>
            </div>
            
        </div>
        </section>

        <div class='spacer'></div>

        <section>
          <div class='container-xxl flex-column'>
              <div class='position-relative testimonials-wrapper'>
                    <!-- <h3 class='page-header'>{{ __('Testimonials') }}</h3> -->
                    <div class='swiper testimonials'>

                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                    <div class='card-overlay shadow-none'>

                                        <div class='overlay-img row g-0'>
                                            <div class='col g-0'>
                                            </div>
                                            <div class='col g-0'>
                                            <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                            </div>
                                        </div>
                                        <div class='overlay-content'>
                                            <img src="{{ asset('assets/img/leaves.png') }}" class="">

                                            <div class='d-flex justify-content-center flex-column px-5 w-75 mx-auto mb-5'>
                                                <p class='text-white text-center font-domaine'><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore
                                                magna aliqua"</i>
                                                </p>
                                                <p class='text-white text-center'>C.E.O., Trisolace</p>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="swiper-slide">
                                    <div class='card-overlay shadow-none'>

                                        <div class='overlay-img row g-0'>
                                            <div class='col g-0'>
                                            </div>
                                            <div class='col g-0'>
                                            <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                            </div>
                                        </div>
                                        <div class='overlay-content'>
                                            <img src="{{ asset('assets/img/leaves.png') }}" class="">

                                            <div class='d-flex justify-content-center flex-column px-5 w-75 mx-auto mb-5'>
                                                <p class='text-white text-center font-domaine'><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore
                                                magna aliqua"</i>
                                                </p>
                                                <p class='text-white text-center'>C.E.O., Trisolace</p>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="swiper-slide">
                                    <div class='card-overlay shadow-none'>

                                        <div class='overlay-img row g-0'>
                                            <div class='col g-0'>
                                            </div>
                                            <div class='col g-0'>
                                            <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                            </div>
                                        </div>
                                        <div class='overlay-content'>
                                            <img src="{{ asset('assets/img/leaves.png') }}" class="">

                                            <div class='d-flex justify-content-center flex-column px-5 w-75 mx-auto mb-5'>
                                                <p class='text-white text-center font-domaine'><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore
                                                magna aliqua"</i>
                                                </p>
                                                <p class='text-white text-center'>C.E.O., Trisolace</p>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                        
                        </div>

                        <div class="swiper-pagination"></div>

                    </div>
              </div>
          </div>
        </section>

        <div class="spacer"></div>

        <section class="blogs">
        
          <div class="content-wrapper">
            <div class='container-xxl flex-column mb-4'>
                <div class='position-relative blog-posts-wrapper'>

                    <div class="d-flex justify-content-between">
                        <h3 class='page-header'>{{ __('Blog posts') }}</h3>
                        <a href="{{ route('blogs-page') }}" class="text-white btn-link">
                            {{ __('View All') }}

                            <svg width="88" height="58" viewBox="0 0 88 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 29C0.25 28.1712 0.57924 27.3763 1.16529 26.7903C1.75134 26.2042 2.5462 25.875 3.375 25.875H77.0813L57.4125 6.2125C56.8257 5.62571 56.4961 4.82985 56.4961 4C56.4961 3.17015 56.8257 2.37429 57.4125 1.7875C57.9993 1.20071 58.7952 0.871052 59.625 0.871052C60.4548 0.871052 61.2507 1.20071 61.8375 1.7875L86.8375 26.7875C87.1285 27.0778 87.3594 27.4226 87.517 27.8023C87.6745 28.1819 87.7556 28.589 87.7556 29C87.7556 29.411 87.6745 29.818 87.517 30.1977C87.3594 30.5774 87.1285 30.9222 86.8375 31.2125L61.8375 56.2125C61.2507 56.7993 60.4548 57.1289 59.625 57.1289C58.7952 57.1289 57.9993 56.7993 57.4125 56.2125C56.8257 55.6257 56.4961 54.8298 56.4961 54C56.4961 53.1701 56.8257 52.3743 57.4125 51.7875L77.0813 32.125H3.375C2.5462 32.125 1.75134 31.7958 1.16529 31.2097C0.57924 30.6237 0.25 29.8288 0.25 29Z" fill="white"/>
                            </svg>

                        </a>
                    </div>
                    <div class='swiper blog-posts'>

                        <div class="swiper-wrapper">

                            @if($blogs)

                                @foreach($blogs as $blog)

                                    <div class="swiper-slide">
                                        <a href="{{ route('blog-page', ['blog_id' => $blog->id] ) }}">
                                            <div class='course-card-wrapper'>
                                                <div class='course-img'>
                                                    <img src="{{ $blog->featured_img_url }}" alt="snail" />
                                                </div>
                                                <div class='card-footer d-flex flex-column'>
                                                    <div class='course-details'>
                                                        <p>{{ __($blog->title) }}</p>
                                                        <p class="text-clamp">{{ __($blog->description) }}</p>
                                                        <p class="text-muted text-small d-flex align-items-center">
                                                            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_476_18)">
                                                                <path d="M50 21.875C50 21.0462 49.6708 20.2513 49.0847 19.6653C48.4987 19.0792 47.7038 18.75 46.875 18.75C46.0462 18.75 45.2513 19.0792 44.6653 19.6653C44.0792 20.2513 43.75 21.0462 43.75 21.875V56.25C43.7502 56.8008 43.8959 57.3418 44.1725 57.8182C44.4491 58.2945 44.8467 58.6893 45.325 58.9625L67.2 71.4625C67.9179 71.8505 68.759 71.9423 69.5437 71.7183C70.3283 71.4943 70.9942 70.9722 71.3991 70.2637C71.8039 69.5553 71.9156 68.7165 71.7102 67.9268C71.5048 67.1371 70.9987 66.459 70.3 66.0375L50 54.4375V21.875Z" fill="black"/>
                                                                <path d="M50 100C63.2608 100 75.9785 94.7322 85.3553 85.3553C94.7322 75.9785 100 63.2608 100 50C100 36.7392 94.7322 24.0215 85.3553 14.6447C75.9785 5.26784 63.2608 0 50 0C36.7392 0 24.0215 5.26784 14.6447 14.6447C5.26784 24.0215 0 36.7392 0 50C0 63.2608 5.26784 75.9785 14.6447 85.3553C24.0215 94.7322 36.7392 100 50 100ZM93.75 50C93.75 61.6032 89.1406 72.7312 80.9359 80.9359C72.7312 89.1406 61.6032 93.75 50 93.75C38.3968 93.75 27.2688 89.1406 19.0641 80.9359C10.8594 72.7312 6.25 61.6032 6.25 50C6.25 38.3968 10.8594 27.2688 19.0641 19.0641C27.2688 10.8594 38.3968 6.25 50 6.25C61.6032 6.25 72.7312 10.8594 80.9359 19.0641C89.1406 27.2688 93.75 38.3968 93.75 50Z" fill="black"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_476_18">
                                                                <rect width="100" height="100" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>

                                                            <small>{{ format_date($blog->updated_at) }}</small>
                                                        </p>

                                                    </div>
                                                                                                     

                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach

                            @endif

                        </div>

                        <div class="swiper-pagination"></div>

                    </div>

                    <div class='swiper-button-next'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33" fill="none">
                        <path fillRule="evenodd" clipRule="evenodd" d="M0.425707 0.371485C0.560232 0.25373 0.720043 0.160303 0.895986 0.096558C1.07193 0.0328126 1.26055 0 1.45103 0C1.64152 0 1.83014 0.0328126 2.00608 0.096558C2.18203 0.160303 2.34184 0.25373 2.47636 0.371485L19.8548 15.5451C19.9896 15.6625 20.0966 15.8021 20.1697 15.9557C20.2427 16.1093 20.2802 16.274 20.2802 16.4403C20.2802 16.6067 20.2427 16.7713 20.1697 16.925C20.0966 17.0786 19.9896 17.2181 19.8548 17.3356L2.47636 32.5092C2.20443 32.7466 1.83561 32.88 1.45103 32.88C1.06646 32.88 0.697641 32.7466 0.425707 32.5092C0.153773 32.2717 0.00100237 31.9497 0.00100237 31.6139C0.00100237 31.2782 0.153773 30.9561 0.425707 30.7187L16.7817 16.4403L0.425707 2.16197C0.290841 2.04451 0.183839 1.90498 0.110831 1.75136C0.0378232 1.59774 0.000244141 1.43305 0.000244141 1.26673C0.000244141 1.10041 0.0378232 0.935719 0.110831 0.782099C0.183839 0.628478 0.290841 0.488943 0.425707 0.371485Z" fill="black"/>
                        </svg>
                    </div>
                    <div class='swiper-button-prev'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="33" viewBox="0 0 21 33" fill="none">
                        <path fillRule="evenodd" clipRule="evenodd" d="M19.8545 0.371485C19.9894 0.488943 20.0964 0.628478 20.1694 0.782099C20.2424 0.935719 20.28 1.10041 20.28 1.26673C20.28 1.43305 20.2424 1.59774 20.1694 1.75136C20.0964 1.90498 19.9894 2.04451 19.8545 2.16197L3.49855 16.4403L19.8545 30.7187C20.1265 30.9561 20.2792 31.2782 20.2792 31.6139C20.2792 31.9497 20.1265 32.2717 19.8545 32.5092C19.5826 32.7466 19.2138 32.88 18.8292 32.88C18.4446 32.88 18.0758 32.7466 17.8039 32.5092L0.425463 17.3356C0.290597 17.2181 0.183595 17.0786 0.110587 16.925C0.037579 16.7713 0 16.6067 0 16.4403C0 16.274 0.037579 16.1093 0.110587 15.9557C0.183595 15.8021 0.290597 15.6625 0.425463 15.5451L17.8039 0.371485C17.9384 0.25373 18.0982 0.160303 18.2742 0.096558C18.4501 0.0328126 18.6387 0 18.8292 0C19.0197 0 19.2083 0.0328126 19.3843 0.096558C19.5602 0.160303 19.72 0.25373 19.8545 0.371485Z" fill="black"/>
                        </svg>
                    </div>

                </div>
            </div>
          </div>

        </section>

        <div class='spacer'></div>

        <section class='call-to-action'>
          <div class='container-xxl'>
              
              <div class="row row-cols-lg-2 g-5">
                  <div class='col'>
                     <img src="/assets/img/call-to-action-img.png" alt='human' />
                  </div>
                  <div class='col d-flex flex-column justify-content-center'>
                    <h1>
                        {{
                            __('Take the next step toward your personal and professional goals with Agricgate.farm')
                        }}
                    </h1>
                    <p>
                      {{ __('Join now to receive personalized recommendations from the full Agricgate.farm catalog.') }}
                    </p>
                    <button class='btn btn-success max-content' data-bs-toggle="modal" data-bs-target="#registerModal">{{ __('Join for Free') }}</button>
                  </div>
              </div>

          </div>
        </section>


    </main>


@endsection

@section('scripts')

<script>


    const blogPostsSwiper = new Swiper('.blog-posts', {
        autoplay: false,
        loop: false,
        spaceBetween: 20,
        slidesPerView: 3,
        navigation: {
                
            nextEl: '.blog-posts-wrapper .swiper-button-next',
            prevEl: '.blog-posts-wrapper .swiper-button-prev',
            
        },
        breakpoints: {
            // when window width is >= 320px
            100: {
            slidesPerView: 1,
            spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 2,
            spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 3,
            spaceBetween: 40
            },
            1200: {
                spaceBetween: 16,
                slidesPerView: 4, 
            }
        }

    });

    const testimonialsSwiper = new Swiper('.testimonials', {
        autoplay: {
            delay: 5000,
        },
        loop: false,
        spaceBetween: 16,
        slidesPerView: 1,
        navigation: {
                
            nextEl: '.testimonials-wrapper .swiper-button-next',
            prevEl: '.testimonials-wrapper .swiper-button-prev',
            
        },

    });

    const exploreByCategorySwiper = new Swiper('.explore-by-category', {
        loop: false,
        spaceBetween: 26,
        slidesPerView: 4,
        navigation: {
                
            nextEl: '.explore-by-category-wrapper .swiper-button-next',
            prevEl: '.explore-by-category-wrapper .swiper-button-prev',
            
        },
        breakpoints: {
            // when window width is >= 320px
            100: {
            slidesPerView: 1,
            spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 2,
            spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 3,
            spaceBetween: 40
            },
            1200: {
                spaceBetween: 16,
                slidesPerView: 4, 
            }
        }

    });

    const featuredCourseSwiper = new Swiper('.featured-courses', {
        loop: false,
        spaceBetween: 26,
        slidesPerView: 4,
        navigation: {
                  
            nextEl: '.featured-courses-wrapper .swiper-button-next',
            prevEl: '.featured-courses-wrapper .swiper-button-prev',
            
        },
        breakpoints: {
            // when window width is >= 320px
            100: {
            slidesPerView: 1,
            spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 2,
            spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 2,
            spaceBetween: 40
            },
            1200: {
                spaceBetween: 16,
                slidesPerView: 4, 
            }
        }

    });

    const pageHeroSwiper = new Swiper('.page-hero', {
        // Optional parameters
        effect: 'fade',
        autoplay: {
            delay: 10000,
        },
        loop: true,
        spaceBetween: 50,
        slidesPerView: 1,

    });

</script>

@endsection