@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content blogs">

        <div class="container-xxl">

            <div class="pt-3">

                <h3 class="mt-3 fw-600 mb-0">{{ __('All blog posts') }}</h3>
                <p class="text-muted mb-5">{{ __('You can read our latest news here') }}</p>

                <div class="row row-cols-1 row-cols-lg-4 gx-4 gy-4">

                    @if($blogs)

                        @foreach($blogs as $blog)

                            <a href="{{ route('blog-page', ['blog_id' => $blog->id] ) }}" class="col">
                                <div class='course-card-wrapper'>
                                    <div class='course-img'>
                                        <img src="{{ $blog->featured_img_url }}" alt="snail" />
                                    </div>
                                    <div class='card-footer d-flex flex-column align-items-end'>
                                        <div class='course-details'>
                                            <p>{{ translate($blog->title) }}</p>
                                            <p class="text-clamp">{{ translate($blog->description) }}</p>
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

                        @endforeach

                    @endif

                </div>

            </div>

        </div>  

    </main>

@endsection