@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container">

                <div class="blog-post-wrapper pt-3">

                    <section>

                        <h1 class="mt-3 mb-5 fw-600">{{ __($blog->title) }}</h1>

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

                                                                    <small>{{ format_date($recommended_blog->updated_at) }}</small>
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