@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">
        <div class="container">

            @if( !empty($courses[0] ))

                <h3 class='mt-5 mb-4 fw-bold text-black ms-4 mb-5'>{{ __('Search Results for') }} “{{ __($search_query) }}”</h3>

            @else

                <h3 class='mt-5 mb-4 fw-bold text-black ms-4 mb-5'>{{ __('No Search Results for') }} “{{ __($search_query) }}”</h3>

            @endif

            <section>

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 gx-4 gy-5">

                    @foreach($courses as $course)

                        <a href="{{ route('course-page', [ 'course_id' => $course->id ]) }}" class="col">
                            <div class='course-card-wrapper'>
                                <div class='course-img'>
                                    <img src="{{ $course->featured_img_url }}" alt="snail" />
                                </div>
                                <div class='card-footer d-flex flex-column align-items-end'>
                                    <div class='course-details'>
                                        <p>{{ __($course->title) }}</p>
                                        <p>{{ __($course->description) }}</p>
                                    </div>
                                    
                                    <button class='btn btn-success w-auto'>{{ __('View Course') }}</button>

                                </div>
                            </div>
                        </a>

                    @endforeach
                   
                </div>

            </section>

            <div class="spacer"></div>


        </div>
    </main>

@endsection
