@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content blogs">

        <div class="container-xxl">

            <div class="pt-3">

                <h3 class="mt-3 fw-600 mb-0">{{ __('Latest Blog Posts') }}</h3>
                <p class="text-muted mb-4">{{ __('You can read our latest news here') }}</p>

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