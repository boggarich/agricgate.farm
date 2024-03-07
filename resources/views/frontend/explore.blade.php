@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container-xxl">

            <section>
                <div class="d-flex py-5 scroll-x">

                    <a href="{{ route('explore') }}" @class([
                        'btn',
                        'btn-black',
                        'me-3',
                        'active' => !Route::current()->hasParameter('course_category_id')
                    ])>{{ __('All') }}</a>

                    @foreach($course_categories as $course_category)

                        @php 

                            $category_id = $course_category->id;
                            $route_param_category_id = Route::current()->parameter('course_category_id');
                            $active = $category_id == $route_param_category_id;

                        @endphp

                        <a href="{{ route('explore', [ 'course_category_id' => $category_id ]) }}"

                         @class([
                            'btn',
                            'btn-black',
                            'me-3',
                            'active' => $active
                        ])  >{{ translate($course_category->title) }}
                        </a>

                    @endforeach

                </div>
            </section>

            <section>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gx-4 gy-5">

                    @foreach($courses as $course)

                        <a href="{{ route('course-page', ['course_id' => $course->id ] ) }}" class="col">
                            <div class='course-card-wrapper'>
                                <div class='course-img'>
                                    <img src="{{ $course->featured_img_url }}" alt="snail" />
                                </div>
                                <div class='card-footer d-flex flex-column align-items-end'>
                                    <div class='course-details'>
                                        <p>{{ translate($course->title) }} </p>
                                        <p>{{ translate($course->description) }}</p>
                                    </div>
                                    
                                    <button class='btn btn-outline-success w-auto'>{{ __('View Course') }}</button>
            
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