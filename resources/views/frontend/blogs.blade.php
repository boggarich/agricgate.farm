@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container">

            <div class="pt-3">

                <h3 class="page-header my-5 fw-600">{{ __('All blog posts') }}</h3>

                <div class="row row-cols-1 row-cols-lg-3 gx-5 gy-5">

                    @if($blogs)

                        @foreach($blogs as $blog)

                            <a href="{{ route('blog-page', ['blog_id' => $blog->id] ) }}" class="col">
                                <div class='course-card-wrapper'>
                                    <div class='course-img'>
                                        <img src="{{ $blog->featured_img_url }}" alt="snail" />
                                    </div>
                                    <div class='card-footer d-flex flex-column align-items-end'>
                                        <div class='course-details'>
                                            <p>{{ __($blog->title) }}</p>
                                            <p class="text-clamp">{{ __($blog->description) }}</p>
                                        </div>
                                        
                                        <button class='btn btn-success w-auto mb-3 me-2 mt-2'>{{ __('Read more') }}</button>

                                    </div>
                                </div>
                            </a>

                        @endforeach

                    @endif

                </div>

                <div class="spacer"></div>

            </div>

        </div>  

    </main>

@endsection