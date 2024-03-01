@extends('layouts.main-layout')

@section('main-content')

<main class='main-content mt-5'>

    <div class='container'>

        <section>

            <div class='row g-5'>

                <div class='col-lg-8'>

                    @if($course->video_url)

                    <div id="player"></div>

                    <input type="hidden" value="{{ generate_youtube_video_id($course->video_url) }}" id="videoId" />
                    <!-- <media-player title="{{ $course->title }}" src="{{ $course->video_url }}" playsinline >

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

                    </media-player> -->

                    @else 

                        <img src="{{ $course->featured_img_url }}" class="img-fluid course-featured-img" alt="poster">

                    @endif
                    
                </div>

                <div class='col-lg-4'>
                    <div class='card course-card'>
                        <div class='card-body'>
                            <h6 class='mb-4'>{{ __('Course Details') }}</h6>
                            <p class=''>{{ __('Title') }}: {{ __($course->title) }}</p>
                            <p>{{ __('Description') }}: {{ __($course->description) }}
                            </p>
                            <p>{{ __('Duration') }}:
                                @if($course->hours) 
                                    {{ $course->hours . ($course->hours == 1 ? 'hr' : 'hrs') }}
                                @endif
                                @if($course->mins) 
                                    {{ $course->mins . ($course->mins == 1 ? 'min' : 'mins') }}
                                @endif
                                @if($course->secs)
                                    {{ $course->secs . ($course->secs == 1 ? 'sec' : 'secs') }}
                                @endif
                            </p>

                            @guest

                                <button class='btn btn-primary w-100 my-3' data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('ENROLL NOW') }}</button>

                            @endguest

                            @auth

                                @php 

                                    $enroll_course = Illuminate\Support\Facades\DB::table('enroll_courses')
                                                                ->where('course_id', $course->id)
                                                                ->where('user_id', Auth::id())
                                                                ->exists();

                                    $course_progress_query = Illuminate\Support\Facades\DB::table('course_progress')
                                                                ->where('course_id', $course->id)
                                                                ->where('user_id', Auth::id());

                                    $course_progress = $course_progress_query->exists();

                                @endphp

                                @if($enroll_course)

                                    @if($course_progress)

                                        @php 

                                            $lesson_id = App\Models\CourseProgress::select('lesson_id')
                                                            ->where('course_id', $course->id)
                                                            ->where('user_id', Auth::id())
                                                            ->first()
                                                            ->lesson_id;

                                        @endphp

                                        @if($lesson_id)

                                            @if($lessons_count == $complete_lessons_count)

                                                <a href="{{ route('lesson-page', ['course_id' => $course->id, 'lesson_id' => $lesson_id ]) }}" class='btn btn-success w-100 my-3'>{{ __('Review Course') }}</a>

                                            @else

                                                <a href="{{ route('lesson-page', ['course_id' => $course->id, 'lesson_id' => $lesson_id ]) }}" class='btn btn-primary w-100 my-3'>{{ __('Continue Learning') }}</a>

                                            @endif

                                        @endif

                                    @else

                                        @php 

                                            $lesson = '';

                                            $topic = App\Models\Topic::select('id')
                                                                ->firstWhere('course_id', $course->id);

                                            if($topic) {

                                                $lesson = App\Models\Lesson::select('id')
                                                                ->firstWhere('topic_id', $topic->id);
                                            
                                            };
                                                                

                                        @endphp

                                        @if($lesson)

                                            @if($lessons_count == $complete_lessons_count)

                                                <a href="{{ route('start-learning', ['course_id'=> $course->id , 'lesson_id' => $lesson->id ]) }}" class='btn btn-success w-100 my-3'>{{ __('Review Course') }}</a>

                                            @else 

                                                <a href="{{ route('start-learning', ['course_id'=> $course->id , 'lesson_id' => $lesson->id ]) }}" class='btn btn-primary w-100 my-3'>{{ __('Start Learning') }}</a>

                                            @endif
                                            
                                        @else 

                                            <button class='btn btn-primary w-100 my-3'>{{ __('Coming Soon') }}</a>
                                    
                                        @endif

                                    @endif

                                @else 

                                    <form action="{{ route('enroll') }}" method="POST"> 
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit" class='btn btn-primary w-100 my-3'>{{ __('ENROLL NOW') }}</button>

                                    </form>

                                @endif




                            @endauth

                            <!-- @Auth

                                <button class='btn btn-primary w-100 my-3'>Start Learning</button>

                            @endauth -->

                            @guest
                                <button class='btn my-3 add-to-favorite-btn' data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_330_18)">
                                        <path d="M17.5347 17.535V41.2069C17.5346 41.3591 17.5741 41.5088 17.6494 41.6411C17.7247 41.7734 17.8331 41.8839 17.9641 41.9616C18.095 42.0392 18.2439 42.0815 18.3962 42.0841C18.5484 42.0868 18.6987 42.0497 18.8322 41.9767L28.0555 36.9442L37.2788 41.9767C37.4123 42.0497 37.5626 42.0868 37.7148 42.0841C37.8671 42.0815 38.016 42.0392 38.1469 41.9616C38.2779 41.8839 38.3863 41.7734 38.4616 41.6411C38.5369 41.5088 38.5764 41.3591 38.5763 41.2069V17.535C38.5763 16.6049 38.2069 15.7129 37.5492 15.0552C36.8915 14.3976 35.9995 14.0281 35.0694 14.0281H21.0416C20.1115 14.0281 19.2195 14.3976 18.5618 15.0552C17.9041 15.7129 17.5347 16.6049 17.5347 17.535Z" fill="black"/>
                                        </g>
                                        <circle cx="28.0556" cy="28.0556" r="26.6528" stroke="#555555" stroke-width="2.80556"/>
                                        <defs>
                                        <clipPath id="clip0_330_18">
                                        <rect width="28.0556" height="28.0556" fill="white" transform="translate(14.0278 14.028)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>

                                </button>
                            @endguest

                            @auth
                                <button class='btn my-3 add-to-favorite-btn' id="addToFavoriteBtn">

                                    @php 

                                        $favorite_course = Illuminate\Support\Facades\DB::table('favorite_courses')
                                                                ->where('course_id', $course->id)
                                                                ->where('user_id', Auth::id())
                                                                ->exists();

                                    @endphp
                                                

                                    @if($favorite_course)

                                        <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="28.0556" cy="28.0556" r="26.6528" stroke="#555555" stroke-width="2.80556"/>
                                            <path d="M37.9806 16.9902C37.7208 16.9979 37.4742 17.1065 37.2931 17.2929L22.0001 32.5859L15.7071 26.2929C15.615 26.1969 15.5046 26.1203 15.3825 26.0675C15.2603 26.0147 15.1289 25.9869 14.9959 25.9855C14.8628 25.9842 14.7309 26.0094 14.6077 26.0597C14.4845 26.1099 14.3726 26.1843 14.2785 26.2784C14.1844 26.3725 14.1101 26.4844 14.0598 26.6075C14.0095 26.7307 13.9843 26.8627 13.9856 26.9957C13.987 27.1288 14.0149 27.2602 14.0677 27.3823C14.1205 27.5045 14.1971 27.6148 14.2931 27.707L21.2931 34.707C21.4806 34.8944 21.7349 34.9998 22.0001 34.9998C22.2653 34.9998 22.5196 34.8944 22.7071 34.707L38.7071 18.707C38.8516 18.5665 38.9503 18.3857 38.9903 18.1882C39.0302 17.9906 39.0096 17.7857 38.931 17.6001C38.8525 17.4145 38.7197 17.2569 38.5501 17.1481C38.3805 17.0393 38.182 16.9842 37.9806 16.9902Z" fill="black"/>
                                        </svg>

                                    @else
                                    
                                        <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_330_18)">
                                            <path d="M17.5347 17.535V41.2069C17.5346 41.3591 17.5741 41.5088 17.6494 41.6411C17.7247 41.7734 17.8331 41.8839 17.9641 41.9616C18.095 42.0392 18.2439 42.0815 18.3962 42.0841C18.5484 42.0868 18.6987 42.0497 18.8322 41.9767L28.0555 36.9442L37.2788 41.9767C37.4123 42.0497 37.5626 42.0868 37.7148 42.0841C37.8671 42.0815 38.016 42.0392 38.1469 41.9616C38.2779 41.8839 38.3863 41.7734 38.4616 41.6411C38.5369 41.5088 38.5764 41.3591 38.5763 41.2069V17.535C38.5763 16.6049 38.2069 15.7129 37.5492 15.0552C36.8915 14.3976 35.9995 14.0281 35.0694 14.0281H21.0416C20.1115 14.0281 19.2195 14.3976 18.5618 15.0552C17.9041 15.7129 17.5347 16.6049 17.5347 17.535Z" fill="black"/>
                                            </g>
                                            <circle cx="28.0556" cy="28.0556" r="26.6528" stroke="#555555" stroke-width="2.80556"/>
                                            <defs>
                                            <clipPath id="clip0_330_18">
                                            <rect width="28.0556" height="28.0556" fill="white" transform="translate(14.0278 14.028)"/>
                                            </clipPath>
                                            </defs>
                                        </svg>

                                    @endif

                                </button>
                            @endauth

                        </div>
                    </div>
                </div>

            </div>

        </section>

        <div class='spacer mt-0 mb-5'></div>

        <section class='course-info'>

            <ul class="nav nav-tabs" id="course" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="course-info-tab" data-bs-toggle="tab" data-bs-target="#course-info-tab-pane" type="button" role="tab" aria-controls="course-info-tab-pane" aria-selected="true">{{ __('Course Info') }}</button>
                </li>

                @auth

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="q-and-a-tab" data-bs-toggle="tab" data-bs-target="#q-and-a-tab-pane" type="button" role="tab" aria-controls="q-and-a-tab-pane" aria-selected="false">{{ __('Q&A') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="announcements-tab" data-bs-toggle="tab" data-bs-target="#announcements-tab-pane" type="button" role="tab" aria-controls="announcements-tab-pane" aria-selected="false"> {{ __('Announcements') }}</button>
                    </li>

                @endauth

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

                @auth

                    <div class="tab-pane fade q-and-a" id="q-and-a-tab-pane" role="tabpanel" aria-labelledby="q-and-a-tab" tabindex="0">
                        <h5 class='mt-5 mb-5 fw-bold text-black'>{{ __('Question & Answer') }}</h5>

                        @session('question')

                            {!! $value !!}

                            <div class="spacer"></div>

                        @endsession

                        <div class='row g-5'>

                            <div class='col-md-8 align-items-end mb-5'>

                                <div id="questionsAndAnswersWrapper">

                                    @foreach($question_and_answers as $question_and_answer)
                                    
                                        <div class="chat-wrapper">
                                            <img src="{{ $question_and_answer->user->profile_img_url }}" alt="profile image">
                                            <div class="chat-bubble">
                                                <p>
                                                    {{ $question_and_answer->user->name }} 
                                                    <span class="dot-separator"></span>
                                                    <span>{{ time_since($question_and_answer->updated_at) }}</span>
                                                </p>
                                                <p>{!! $question_and_answer->question !!}</p>
                                            </div>
                                        </div>

                                        @if($question_and_answer->answer)

                                            <div class="chat-wrapper answer">
                                                <img src="{{ asset('assets/img/PersonCircle.png') }}" alt="profile image">
                                                <div class="chat-bubble">
                                                    <p>Admin 
                                                        <span class="dot-separator"></span>
                                                        <span>{{ time_since($question_and_answer->updated_at) }}</span>
                                                    </p>
                                                    <p>{!! $question_and_answer->answer !!}</p>
                                                </div>
                                            </div>

                                        @endif

                                    @endforeach

                                </div>

                                <div id="editor" class="w-100 mt-10 bg-white mb-4"></div>

                                <input type="hidden" value="{{ Auth::user()->profile_img_url }}" id="profileImg">
                                <input type="hidden" name="course_id" value="{{ $course->id }}" required id="courseId">
                                <input type="hidden" name="question" value="" id="question" required>
                                <button type="submit" class='btn btn-success d-table ms-auto' id="askQuestionBtn">{{ __('Ask Question') }}</button>

                            </div>

                            <div class='col-md-4'></div>


                        </div>

                        <div class='spacer'></div>
                    </div>

                    <div class="tab-pane fade tab-content-announcements" id="announcements-tab-pane" role="tabpanel" aria-labelledby="announcements-tab" tabindex="0">
                        <h5 class='mt-5 mb-5 fw-bold text-black'>{{ __('Announcements') }}</h5>


                        <div class='row g-5'>

                            <div class='col-md-8'>

                                @if($announcements)

                                    @foreach($announcements as $announcement)
                                
                                        <div class="bullet mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                <g clip-path="url(#clip0_240_889)">
                                                <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="black"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_240_889">
                                                <rect width="30" height="30" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                            <p>
                                                {{ __($announcement->announcement) }}
                                            </p>
                                        </div>

                                    @endforeach

                                @else 

                                    <p>Yay! You're all caught up.</p>

                                @endif


                            </div>

                            <div class='col-md-4'></div>

                        </div>
                    </div>

                @endauth

            </div>

        </section>

        <div class='spacer'></div>

        <section>
            <div class='container flex-column'>

                <div class='position-relative recommended-courses-wrapper'>
                    <h3 class='page-header'>{{ __('Recommended Courses') }}</h3>
                    <div class='swiper recommended-courses'>

                        <div class="swiper-wrapper">

                            @foreach($recommended_courses as $recommended_course)

                                <div class="swiper-slide">
                                    <a href="{{ route('course-page', ['course_id' => $recommended_course->id ]) }} ">
                                        <div class='course-card-wrapper'>
                                            <div class='course-img'>
                                                <img src="{{ $recommended_course->featured_img_url }}" alt="snail" />
                                            </div>
                                            <div class='card-footer d-flex flex-column align-items-end'>
                                                <div class='course-details'>
                                                    <p>{{ __($recommended_course->title) }}</p>
                                                    <p>{{ __($recommended_course->description) }}</p>
                                                </div>
                                                
                                                <button class='btn btn-success w-auto'>{{ __('View Course') }}</button>
                        
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

    </div>

    <div class='spacer'></div>
    <div class='spacer'></div>
    <div class='spacer'></div>

</main>

@endsection

@section('scripts')

    <script>
 
        const recommendedCoursesSwiper = new Swiper('.recommended-courses', {
            loop: false,
            spaceBetween: 26,
            slidesPerView: 4,
            navigation: {
                    
                nextEl: '.recommended-courses-wrapper .swiper-button-next',
                prevEl: '.recommended-courses-wrapper .swiper-button-prev',
                
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

        let options = {
            theme: 'snow',
            formats: [
                'header',
                'bold',
                'italic',
                'underline',
                'strike',
                'blockquote',
                'list',
                'bullet',
                'link',
                'image',
                'align',
                'color',
                'code-block',
            ],
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link', 'image'],
                    [{ align: [] }],
                    [{ color: [] }],
                    ['code-block'],
                    ['clean'],
                ],
            },
        }

        var quill = new Quill('#editor', options);

        quill.on('text-change', (delta, oldDelta, source) => {

            $(ext.jsId.question).val(quill.root.innerHTML);

        });

        $(ext.jsId.askQuestionBtn).on('click', () => {

            let userProfileImg = $(ext.jsId.profileImg).val();

            commonObj.askQuestion(userProfileImg, quill);

        });



    </script>

@endsection