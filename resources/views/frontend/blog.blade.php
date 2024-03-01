@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container">

                <div class="blog-post-wrapper pt-3">

                    <section>

                        <h1 class="mt-5 mb-5 fw-600">{{ __($blog->title) }}</h1>

                        <div class="user-details-wrapper mb-5">
                            <img src="{{ asset('assets/img/agricgate-logo.jpg') }}" alt="user-profile"/>
                            <div>
                                <p class="mb-0">Agricgate.farm</p>
                                <p class="mb-0 text-muted">{{ __('Published on') }}: {{ format_date($blog->updated_at) }}</p>
                            </div>
                        </div>
                        
                        <div class="blog-content">
                            {!!  $blog->blog !!}
                        </div>

                    </section>

                    <div class="spacer"></div>
                    <hr>
                    
                    <section class='flex-column mb-5 py-5 '>
                        <div class='position-relative blog-posts-wrapper'>

                            <h3 class='page-header'>{{ __('Recommended from Agricgate.farm') }}</h3>
                        
                            <div class='swiper blog-posts'>

                                <div class="swiper-wrapper">

                                    @if($recommended_blogs)

                                        @foreach($recommended_blogs as $recommended_blog)

                                            <div class="swiper-slide">
                                                <a href="{{ route('blog-page', ['blog_id' => $recommended_blog->id] ) }}">
                                                    <div class='course-card-wrapper'>
                                                        <div class='course-img'>
                                                            <img src="{{ $recommended_blog->featured_img_url }}" alt="snail" />
                                                        </div>
                                                        <div class='card-footer d-flex flex-column align-items-end'>
                                                            <div class='course-details'>
                                                                <p>{{ __($recommended_blog->title) }}</p>
                                                                <p class="text-clamp">{{ __($recommended_blog->description) }}</p>
                                                            </div>
                                                            
                                                            <button class='btn btn-success w-auto mb-3 me-2 mt-2'>{{ __('Read more') }}</button>

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
                    </section>

                </div>

        </div>  

    </main>

@endsection

@section('scripts')

    <script>

        const blogPostsSwiper = new Swiper('.blog-posts', {
            autoplay: false,
            loop: false,
            spaceBetween: 16,
            slidesPerView: 2,
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
                    spaceBetween: 26,
                    slidesPerView: 3, 
                }
            }

        });

    </script>


@endsection