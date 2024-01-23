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
                        <div class='position-relative'>
                            <img src='/assets/img/closeup-of-snail-eating-lettuce.jpg' alt="snail-feeding"/>
                            <div class='container'>
                                <h1 class='page-hero-header'>Learn all there is to snail farming.</h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class='position-relative'>
                            <img src='/assets/img/media12-1-scaled.jpg' alt="snail-feeding"/>
                            <div class='container'>
                                <h1 class='page-hero-header'>Learn Farm management.</h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class='position-relative'>
                            <img src='/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg' alt="snail-feeding"/>
                            <div class='container'>
                                <h1 class='page-hero-header'>Learn from Experts.</h1>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

            </div>

        </section>

        <div class='spacer'></div>

        <section>
           <div class='container'>

              <div class='position-relative featured-courses-wrapper d-flex flex-column'>
                <h3 class='page-header'>Featured Courses</h3>

                <div class='swiper featured-courses'>

                    <div class="swiper-wrapper">


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
                                            
                                            <button class='btn btn-success w-auto'>View Course</button>
                    
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
           <div class='container flex-column'>

              <div class='position-relative explore-by-category-wrapper'>
                <h3 class='page-header'>Explore By Category</h3>
                <div class='swiper explore-by-category'>

                <div class="swiper-wrapper">

                    @foreach($categories as $category)
                    
                        <div class="swiper-slide">
                            <a href="/explore/{{ $category->id }}">
                                <div class='card-overlay has-shadow'>
                                <div class='overlay-img'>
                                    <img src="{{ $category->featured_img_url }}" />
                                </div>
                                <div class='overlay-bg'></div>
                                <div class='overlay-text d-flex align-items-center justify-content-center'><h3 class='page-header'>{{ $category->title }}</h3></div>
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
          <div class='container flex-column'>
              <div class='position-relative testimonials-wrapper'>
                    <h3 class='page-header'>Testimonials</h3>
                    <div class='swiper testimonials'>

                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <a href="#">
                                    <div class='card-overlay shadow-none'>
                                    <div class='overlay-img row g-0'>
                                        <div class='col g-0'>
                                        </div>
                                        <div class='col g-0'>
                                        <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                        </div>
                                    </div>
                                    <div class='overlay-bg-gradient'></div>
                                    <div class='overlay-text d-flex justify-content-center flex-column'>
                                        <p class='text-white'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua
                                        </p>
                                        <p class='text-white'>C.E.O., Trisolace</p>
                                    </div>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="#">
                                    <div class='card-overlay shadow-none'>
                                    <div class='overlay-img row g-0'>
                                        <div class='col g-0'>
                                        </div>
                                        <div class='col g-0'>
                                        <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                        </div>
                                    </div>
                                    <div class='overlay-bg-gradient'></div>
                                    <div class='overlay-text d-flex justify-content-center flex-column'>
                                        <p class='text-white'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua
                                        </p>
                                        <p class='text-white'>C.E.O., Trisolace</p>
                                    </div>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="#">
                                    <div class='card-overlay shadow-none'>
                                    <div class='overlay-img row g-0'>
                                        <div class='col g-0'>
                                        </div>
                                        <div class='col g-0'>
                                        <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                        </div>
                                    </div>
                                    <div class='overlay-bg-gradient'></div>
                                    <div class='overlay-text d-flex justify-content-center flex-column'>
                                        <p class='text-white'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua
                                        </p>
                                        <p class='text-white'>C.E.O., Trisolace</p>
                                    </div>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="#">
                                    <div class='card-overlay shadow-none'>
                                    <div class='overlay-img row g-0'>
                                        <div class='col g-0'>
                                        </div>
                                        <div class='col g-0'>
                                        <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                        </div>
                                    </div>
                                    <div class='overlay-bg-gradient'></div>
                                    <div class='overlay-text d-flex justify-content-center flex-column'>
                                        <p class='text-white'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua
                                        </p>
                                        <p class='text-white'>C.E.O., Trisolace</p>
                                    </div>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="#">
                                    <div class='card-overlay shadow-none'>
                                    <div class='overlay-img row g-0'>
                                        <div class='col g-0'>
                                        </div>
                                        <div class='col g-0'>
                                        <img src="/assets/img/UNDP_GH_Snails_Design_Felix_1-1-scaled.jpg" />
                                        </div>
                                    </div>
                                    <div class='overlay-bg-gradient'></div>
                                    <div class='overlay-text d-flex justify-content-center flex-column'>
                                        <p class='text-white'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua
                                        </p>
                                        <p class='text-white'>C.E.O., Trisolace</p>
                                    </div>
                                    </div>
                                </a>
                            </div>
                           
                        
                        </div>

                        <div class="swiper-pagination"></div>

                    </div>
              </div>
          </div>
        </section>

        <div class='spacer'></div>

        <section class='call-to-action'>
          <div class='container'>
              
              <div class="row row-cols-lg-2 g-5">
                  <div class='col'>
                     <img src="/assets/img/call-to-action-img.png" alt='human' />
                  </div>
                  <div class='col d-flex flex-column justify-content-center'>
                    <h1>
                      Take the next step 
                      toward your personal 
                      and professional goals 
                      with Trisolace.
                    </h1>
                    <p>
                      Join now to receive personalized 
                      recommendations from the full Trisolace catalog.
                    </p>
                    <button class='btn btn-success max-content' data-bs-toggle="modal" data-bs-target="#registerModal">Join for Free</button>
                  </div>
              </div>

          </div>
        </section>


    </main>


@endsection

@section('scripts')

<script>

    const testimonialsSwiper = new Swiper('.testimonials', {
        autoplay: true,
        loop: false,
        spaceBetween: 16,
        slidesPerView: 1,
        navigation: {
                
            nextEl: '.testimonials-wrapper .swiper-button-next',
            prevEl: '.testimonials-wrapper .swiper-button-prev',
            
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },

    });

    const exploreByCategorySwiper = new Swiper('.explore-by-category', {

        loop: false,
        spaceBetween: 26,
        slidesPerView: 4,
        navigation: {
                
            nextEl: '.explore-by-category-wrapper .swiper-button-next',
            prevEl: '.explore-by-category-wrapper .swiper-button-prev',
            
        }

    });

    const featuredCourseSwiper = new Swiper('.featured-courses', {

        loop: false,
        spaceBetween: 26,
        slidesPerView: 4,
        navigation: {
                  
            nextEl: '.featured-courses-wrapper .swiper-button-next',
            prevEl: '.featured-courses-wrapper .swiper-button-prev',
            
        }

    });

    const pageHeroSwiper = new Swiper('.page-hero', {

        // Optional parameters
        autoplay: true,
        loop: true,
        spaceBetween: 50,
        slidesPerView: 1,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },

    });

</script>

@endsection