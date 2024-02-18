@extends('admin.layouts.main-layout')

@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center px-3">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Courses</h1>
        <p class="mr-3">{{ date("M") }} {{ date("d") }}, {{ date("Y") }}</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success mx-5 mb-5">

            {{session('success')}}
            
        </div>
    @endif

    <main class='main-content'>

        <div class='container'>

            <section>

                <div class='row g-5'>

                    <div class='col-lg-8'>

                        @if($course->video_url)

                        <media-player title="{{ $course->title }}" src="{{ $course->video_url }}" playsinline >

                            <media-provider>
                                
                                @if($course->subtitles)

                                    @foreach($course->subtitles as $subtitle)

                                        <track src="{{ $subtitle->subtitle_url }}" kind="subtitles" label="{{ $subtitle->title }}" />

                                    @endforeach

                                @endif

                            </media-provider>

                            @if($course->media_tracker)

                                <media-video-layout thumbnails="{{ $course->media_tracker->media_tracker_url }}"></media-video-layout>

                            @else 

                                <media-video-layout thumbnails=""></media-video-layout>

                            @endif

                        </media-player>

                        @else 

                            <img src="{{ $course->featured_img_url }}" class="img-fluid course-featured-img" alt="poster">

                        @endif
                        
                    </div>

                    <div class='col-lg-4'>
                        <div class='card course-card admin'>
                            <div class='card-body'>
                                <h6 class='mb-4'>{{ __('Course Details') }}</h6>
                                <p class=''>{{ __('Title') }}: {{ __($course->title) }}</p>
                                <p>{{ __('Description') }}: {{ __($course->description) }}
                                </p>
                                <p>{{ __('Duration') }}:
                                    @if($course->hours) 
                                        {{ $course->hours . ($course->hours == 1 ? ' hr' : ' hrs') }}
                                    @endif
                                    @if($course->mins) 
                                        {{ $course->mins . ($course->mins == 1 ? ' min' : ' mins') }}
                                    @endif
                                    @if($course->secs)
                                        {{ $course->secs . ($course->secs == 1 ? ' sec' : ' secs') }}
                                    @endif
                                </p>

                                    @if($course->published_at)

                                        <form method="POST" action="{{ route('admin.course.unpublish', ['course_id' => $course->id, 'page' => 'course_page' ] ) }}">
                                            @method('PUT')
                                            @csrf
                                        
                                            <button type="submit" class="w-100 btn btn-secondary btn-square mt-5">
                                                    Unpublish
                                            </button>

                                        </form> 
                                        
                                    @else 

                                        <form method="POST" action="{{ route('admin.course.publish', ['course_id' => $course->id, 'page' => 'course_page' ] ) }}">
                                            @method('PUT')
                                            @csrf
                                        
                                            <button type="submit" class="w-100 btn btn-primary btn-square mt-5">
                                                    Publish
                                            </button>

                                        </form>

                                    @endif

                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <div class='spacer mt-0 mb-5'></div>

            <section class='course-info admin'>

                <ul class="nav nav-tabs" id="course" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="course-info-tab" data-bs-toggle="tab" data-bs-target="#course-info-tab-pane" type="button" role="tab" aria-controls="course-info-tab-pane" aria-selected="true">{{ __('Course Info') }}</button>
                    </li>

                </ul>

                <div class="tab-content" id="courseTabContent">

                    <div class="tab-pane fade show active" id="course-info-tab-pane" role="tabpanel" aria-labelledby="course-info-tab" tabindex="0">
                        <h5 class='mt-5 mb-4 fw-bold text-black'>{{ __('About Course') }}</h5>
                        {!! $course->about !!}
                        <h5 class='mt-5 mb-4 fw-bold text-black'>{{ __('What will you learn?') }}</h5>
                        <div class='row row-cols-1 row-cols-md-2 g-4 g-md-5'>

                                @php 
                                    
                                    $_what_will_you_learn = explode("\n", $course->what_will_you_learn);

                                @endphp

                                @foreach($_what_will_you_learn as $what_will_you_learn)

                                    <div class='col'>
                                        <div class="bullet">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" viewBox="0 0 35 20" fill="none">
                                                <path d="M10 18.75C7.67936 18.75 5.45376 17.8281 3.81282 16.1872C2.17187 14.5462 1.25 12.3206 1.25 10C1.25 7.67936 2.17187 5.45376 3.81282 3.81282C5.45376 2.17187 7.67936 1.25 10 1.25C12.3206 1.25 14.5462 2.17187 16.1872 3.81282C17.8281 5.45376 18.75 7.67936 18.75 10C18.75 12.3206 17.8281 14.5462 16.1872 16.1872C14.5462 17.8281 12.3206 18.75 10 18.75ZM10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 7.34784 18.9464 4.8043 17.0711 2.92893C15.1957 1.05357 12.6522 0 10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C4.8043 18.9464 7.34784 20 10 20Z" fill="black"/>
                                                <path d="M10 16.25C8.3424 16.25 6.75269 15.5915 5.58058 14.4194C4.40848 13.2473 3.75 11.6576 3.75 10C3.75 8.3424 4.40848 6.75269 5.58058 5.58058C6.75269 4.40848 8.3424 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75269 16.25 8.3424 16.25 10C16.25 11.6576 15.5915 13.2473 14.4194 14.4194C13.2473 15.5915 11.6576 16.25 10 16.25ZM10 17.5C10.9849 17.5 11.9602 17.306 12.8701 16.9291C13.7801 16.5522 14.6069 15.9997 15.3033 15.3033C15.9997 14.6069 16.5522 13.7801 16.9291 12.8701C17.306 11.9602 17.5 10.9849 17.5 10C17.5 9.01509 17.306 8.03982 16.9291 7.12987C16.5522 6.21993 15.9997 5.39314 15.3033 4.6967C14.6069 4.00026 13.7801 3.44781 12.8701 3.0709C11.9602 2.69399 10.9849 2.5 10 2.5C8.01088 2.5 6.10322 3.29018 4.6967 4.6967C3.29018 6.10322 2.5 8.01088 2.5 10C2.5 11.9891 3.29018 13.8968 4.6967 15.3033C6.10322 16.7098 8.01088 17.5 10 17.5Z" fill="black"/>
                                                <path d="M10 13.75C9.00544 13.75 8.05161 13.3549 7.34835 12.6517C6.64509 11.9484 6.25 10.9946 6.25 10C6.25 9.00544 6.64509 8.05161 7.34835 7.34835C8.05161 6.64509 9.00544 6.25 10 6.25C10.9946 6.25 11.9484 6.64509 12.6517 7.34835C13.3549 8.05161 13.75 9.00544 13.75 10C13.75 10.9946 13.3549 11.9484 12.6517 12.6517C11.9484 13.3549 10.9946 13.75 10 13.75ZM10 15C11.3261 15 12.5979 14.4732 13.5355 13.5355C14.4732 12.5979 15 11.3261 15 10C15 8.67392 14.4732 7.40215 13.5355 6.46447C12.5979 5.52678 11.3261 5 10 5C8.67392 5 7.40215 5.52678 6.46447 6.46447C5.52678 7.40215 5 8.67392 5 10C5 11.3261 5.52678 12.5979 6.46447 13.5355C7.40215 14.4732 8.67392 15 10 15Z" fill="black"/>
                                                <path d="M11.875 10C11.875 10.4973 11.6775 10.9742 11.3258 11.3258C10.9742 11.6775 10.4973 11.875 10 11.875C9.50272 11.875 9.02581 11.6775 8.67417 11.3258C8.32254 10.9742 8.125 10.4973 8.125 10C8.125 9.50272 8.32254 9.02581 8.67417 8.67417C9.02581 8.32254 9.50272 8.125 10 8.125C10.4973 8.125 10.9742 8.32254 11.3258 8.67417C11.6775 9.02581 11.875 9.50272 11.875 10Z" fill="black"/>
                                            </svg>
                                            <p class=''>
                                                {{ $what_will_you_learn }}
                                            </p>
                                        </div>
                                    </div>

                                @endforeach

                        </div>

                        <h5 class='mt-5 mb-4 fw-bold text-black'>{{ __('Course Content') }}</h5>

                        <div class='w-75'>

                            <div class="accordion" id="accordion-course-content-1">

                                @foreach($topics as $topic)

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $topic->id }}" aria-expanded="true" aria-controls="collapse{{ $topic->id }}">
                                            {{ __($topic->title) }}
                                        </button>
                                        </h2>
                                        <div id="collapse{{ $topic->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion-course-content-1">
                                            <div class="accordion-body d-flex flex-column">

                                                @foreach($topic->lessons as $lesson)

                                                    <a href="">
                                                        <div class="bullet w-100">
                                                            
                                                            <img src="/assets/img/document.png" />

                                                            <p>
                                                            {{ __($lesson->title) }}
                                                            </p>
                                                        </div>
                                                    </a>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        </div>
                    </div>

                </div>

            </section>

            <div class='spacer'></div>

        </div>

        <div class='spacer'></div>
        <div class='spacer'></div>
        <div class='spacer'></div>

    </main>

@endsection