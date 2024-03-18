@extends('layouts.blank-layout')

@section('main-content')

    <main class="main-content lesson">
    
        <div class="row g-0">

            <div class="col-xl-4 border-end course-content">
                <div class="header">
                    <p class="mb-0">{{ __('Course content') }}</p>
                </div>

                @php 

                    $activeAccordion = false;

                    $lessons_array = [];

                @endphp

                <div class="accordion" id="accordion-course-content-2">


                    @foreach($topics as $topic)

                        <div class="accordion-item">
                            <h2 class="accordion-header">

                                @if($active_lesson)

                                    @php 
                                            $activeAccordion = $topic->id == $active_lesson->topic_id;

                                    @endphp 

                                @endif

                                <button @class([  
                                    'accordion-button',
                                    'collapsed' => !$activeAccordion
                                ]) type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $topic->id }}" aria-expanded="false" aria-controls="collapse{{ $topic->id }}">
                                    <p class="mb-0 flex-grow-1">{{ translate($topic->title) }}</p><span class="me-3">{{ $topic->complete_lessons_count }}/{{ $topic->lessons_count }}</span>
                                </button>

                            </h2>

                            <div id="collapse{{ $topic->id }}" @class([
                                'accordion-collapse', 
                                'collapse',
                                'show' => $activeAccordion
                                ])
                                 data-bs-parent="#accordion-course-content-2">
                                <div class="accordion-body d-flex flex-column">

                                    @foreach($topic->lessons as $lesson)

                                        @php 
                                        
                                            array_push($lessons_array, $lesson->id);

                                        @endphp

                                        @if(

                                            $lesson->complete_status || 
                                            $lesson->active_status || 
                                            ($lessons_array[0] == $lesson->id)

                                        )

                                            <a href="{{ route('lesson-page', ['course_id' => $topic->course_id, 'lesson_id' => $lesson->id]) }}">

                                                @php

                                                    $activeRoute = url()->current() == route('lesson-page', ['course_id' => $topic->course_id, 'lesson_id' => $lesson->id]);

                                                @endphp
                                                <div @class([ 

                                                    'bullet',
                                                    'w-100',
                                                    'active' => $activeRoute
                                                    
                                                ])>
                                                    
                                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M22.6151 8.20683L16.6655 2.14017C16.4934 1.9647 16.2609 1.8667 16.0183 1.8667H6.40733C5.39588 1.8667 4.57666 2.70203 4.57666 3.73337V24.2667C4.57666 25.298 5.39588 26.1334 6.40733 26.1334H21.0527C22.0641 26.1334 22.8833 25.298 22.8833 24.2667V8.8667C22.8833 8.61937 22.7872 8.3823 22.6151 8.20683ZM16.476 19.6H9.15333C8.64806 19.6 8.23799 19.1819 8.23799 18.6667C8.23799 18.1515 8.64806 17.7334 9.15333 17.7334H16.476C16.9813 17.7334 17.3913 18.1515 17.3913 18.6667C17.3913 19.1819 16.9813 19.6 16.476 19.6ZM18.3067 15.8667H9.15333C8.64806 15.8667 8.23799 15.4486 8.23799 14.9334C8.23799 14.4182 8.64806 14 9.15333 14H18.3067C18.8119 14 19.222 14.4182 19.222 14.9334C19.222 15.4486 18.8119 15.8667 18.3067 15.8667ZM16.476 9.33337C15.9707 9.33337 15.5607 8.91523 15.5607 8.40003V3.64377L21.1405 9.33337H16.476Z" fill="#000"/>
                                                    </svg>

                                                    <p>
                                                        {{ translate($lesson->title) }}
                                                    </p>

                                                    @if($lesson->complete_status)

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none" class="d-table ms-auto mt-1">
                                                            <path d="M27.46 13.73C27.46 17.3714 26.0135 20.8637 23.4386 23.4386C20.8637 26.0135 17.3714 27.46 13.73 27.46C10.0886 27.46 6.5963 26.0135 4.02142 23.4386C1.44655 20.8637 0 17.3714 0 13.73C0 10.0886 1.44655 6.5963 4.02142 4.02142C6.5963 1.44655 10.0886 0 13.73 0C17.3714 0 20.8637 1.44655 23.4386 4.02142C26.0135 6.5963 27.46 10.0886 27.46 13.73ZM20.6465 8.52976C20.5239 8.4076 20.3779 8.31141 20.2173 8.24695C20.0567 8.18249 19.8847 8.15109 19.7117 8.15461C19.5387 8.15814 19.3681 8.19652 19.2102 8.26746C19.0524 8.33841 18.9105 8.44046 18.7929 8.56752L12.8324 16.1619L9.24029 12.5681C8.99628 12.3407 8.67355 12.2169 8.34008 12.2228C8.00661 12.2287 7.68844 12.3638 7.45261 12.5996C7.21677 12.8355 7.08168 13.1536 7.0758 13.4871C7.06991 13.8206 7.1937 14.1433 7.42106 14.3873L11.9623 18.9302C12.0846 19.0524 12.2303 19.1486 12.3906 19.2132C12.5509 19.2778 12.7226 19.3094 12.8955 19.3062C13.0683 19.303 13.2387 19.265 13.3965 19.1945C13.5544 19.124 13.6964 19.0225 13.8141 18.8959L20.6654 10.3318C20.8989 10.089 21.028 9.76422 21.0248 9.42729C21.0216 9.09036 20.8864 8.76812 20.6482 8.52976H20.6465Z" fill="#23A047"/>
                                                        </svg>

                                                    @else

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none" class="d-table ms-auto mt-1">
                                                            <g filter="url(#filter0_i_230_20)">
                                                                <rect width="27.46" height="27.46" rx="13.73" fill="white"/>
                                                            </g>
                                                            <rect x="0.5" y="0.5" width="26.46" height="26.46" rx="13.23" stroke="#BBBBBB"/>
                                                            <defs>
                                                                <filter id="filter0_i_230_20" x="0" y="0" width="27.46" height="28.46" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                                <feOffset dy="1"/>
                                                                <feGaussianBlur stdDeviation="1"/>
                                                                <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                                                                <feBlend mode="normal" in2="shape" result="effect1_innerShadow_230_20"/>
                                                                </filter>
                                                            </defs>
                                                        </svg>

                                                    @endif

                                                </div>
                                            </a>

                                        @else 

                                            <div>

                                                @php

                                                    $activeRoute = url()->full() == route('lesson-page', ['course_id' => $topic->course_id, 'lesson_id' => $lesson->id]);

                                                @endphp

                                                <div @class([ 

                                                    'bullet',
                                                    'w-100',
                                                    'active' => $activeRoute
                                                    
                                                ])>
            
                                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M22.6151 8.20683L16.6655 2.14017C16.4934 1.9647 16.2609 1.8667 16.0183 1.8667H6.40733C5.39588 1.8667 4.57666 2.70203 4.57666 3.73337V24.2667C4.57666 25.298 5.39588 26.1334 6.40733 26.1334H21.0527C22.0641 26.1334 22.8833 25.298 22.8833 24.2667V8.8667C22.8833 8.61937 22.7872 8.3823 22.6151 8.20683ZM16.476 19.6H9.15333C8.64806 19.6 8.23799 19.1819 8.23799 18.6667C8.23799 18.1515 8.64806 17.7334 9.15333 17.7334H16.476C16.9813 17.7334 17.3913 18.1515 17.3913 18.6667C17.3913 19.1819 16.9813 19.6 16.476 19.6ZM18.3067 15.8667H9.15333C8.64806 15.8667 8.23799 15.4486 8.23799 14.9334C8.23799 14.4182 8.64806 14 9.15333 14H18.3067C18.8119 14 19.222 14.4182 19.222 14.9334C19.222 15.4486 18.8119 15.8667 18.3067 15.8667ZM16.476 9.33337C15.9707 9.33337 15.5607 8.91523 15.5607 8.40003V3.64377L21.1405 9.33337H16.476Z" fill="#000"/>
                                                    </svg>

                                                    <p>
                                                        {{ translate($lesson->title) }}
                                                    </p>

                                                    @if($lesson->complete_status)

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none" class="d-table ms-auto mt-1">
                                                            <path d="M27.46 13.73C27.46 17.3714 26.0135 20.8637 23.4386 23.4386C20.8637 26.0135 17.3714 27.46 13.73 27.46C10.0886 27.46 6.5963 26.0135 4.02142 23.4386C1.44655 20.8637 0 17.3714 0 13.73C0 10.0886 1.44655 6.5963 4.02142 4.02142C6.5963 1.44655 10.0886 0 13.73 0C17.3714 0 20.8637 1.44655 23.4386 4.02142C26.0135 6.5963 27.46 10.0886 27.46 13.73ZM20.6465 8.52976C20.5239 8.4076 20.3779 8.31141 20.2173 8.24695C20.0567 8.18249 19.8847 8.15109 19.7117 8.15461C19.5387 8.15814 19.3681 8.19652 19.2102 8.26746C19.0524 8.33841 18.9105 8.44046 18.7929 8.56752L12.8324 16.1619L9.24029 12.5681C8.99628 12.3407 8.67355 12.2169 8.34008 12.2228C8.00661 12.2287 7.68844 12.3638 7.45261 12.5996C7.21677 12.8355 7.08168 13.1536 7.0758 13.4871C7.06991 13.8206 7.1937 14.1433 7.42106 14.3873L11.9623 18.9302C12.0846 19.0524 12.2303 19.1486 12.3906 19.2132C12.5509 19.2778 12.7226 19.3094 12.8955 19.3062C13.0683 19.303 13.2387 19.265 13.3965 19.1945C13.5544 19.124 13.6964 19.0225 13.8141 18.8959L20.6654 10.3318C20.8989 10.089 21.028 9.76422 21.0248 9.42729C21.0216 9.09036 20.8864 8.76812 20.6482 8.52976H20.6465Z" fill="#23A047"/>
                                                        </svg>

                                                    @else

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none" class="d-table ms-auto mt-1">
                                                            <g filter="url(#filter0_i_230_20)">
                                                                <rect width="27.46" height="27.46" rx="13.73" fill="white"/>
                                                            </g>
                                                            <rect x="0.5" y="0.5" width="26.46" height="26.46" rx="13.23" stroke="#BBBBBB"/>
                                                            <defs>
                                                                <filter id="filter0_i_230_20" x="0" y="0" width="27.46" height="28.46" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                                <feOffset dy="1"/>
                                                                <feGaussianBlur stdDeviation="1"/>
                                                                <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                                                                <feBlend mode="normal" in2="shape" result="effect1_innerShadow_230_20"/>
                                                                </filter>
                                                            </defs>
                                                        </svg>

                                                    @endif

                                                </div>
                                            </div>

                                        @endif

                                    @endforeach

                                    
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>

            </div>

            <div class="col-xl-8 lesson-pane">

                <div class="header d-flex">
                    <div class="d-flex align-items-center flex-grow-1">
                        <button class="btn me-4 btn-collapse" id="toggleCourseContentBtn">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="45" height="45" rx="22.5" fill="black" fill-opacity="0.2"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.2562 10.0862C30.3639 10.1733 30.4493 10.2768 30.5076 10.3907C30.5659 10.5046 30.5959 10.6267 30.5959 10.75C30.5959 10.8733 30.5659 10.9954 30.5076 11.1093C30.4493 11.2232 30.3639 11.3266 30.2562 11.4137L17.1976 22L30.2562 32.5862C30.4734 32.7623 30.5953 33.001 30.5953 33.25C30.5953 33.4989 30.4734 33.7377 30.2562 33.9137C30.0391 34.0898 29.7447 34.1886 29.4376 34.1886C29.1306 34.1886 28.8361 34.0898 28.619 33.9137L14.744 22.6637C14.6363 22.5766 14.5509 22.4732 14.4926 22.3593C14.4343 22.2454 14.4043 22.1233 14.4043 22C14.4043 21.8767 14.4343 21.7546 14.4926 21.6407C14.5509 21.5268 14.6363 21.4233 14.744 21.3362L28.619 10.0862C28.7264 9.99891 28.854 9.92964 28.9945 9.88238C29.1349 9.83512 29.2855 9.81079 29.4376 9.81079C29.5897 9.81079 29.7403 9.83512 29.8808 9.88238C30.0212 9.92964 30.1488 9.99891 30.2562 10.0862Z" fill="white"/>
                            </svg>
                        </button>
                        <button class="btn me-4 btn-collapse" id="toggleCourseContentMobileViewBtn">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="45" height="45" rx="22.5" fill="black" fill-opacity="0.2"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.2562 10.0862C30.3639 10.1733 30.4493 10.2768 30.5076 10.3907C30.5659 10.5046 30.5959 10.6267 30.5959 10.75C30.5959 10.8733 30.5659 10.9954 30.5076 11.1093C30.4493 11.2232 30.3639 11.3266 30.2562 11.4137L17.1976 22L30.2562 32.5862C30.4734 32.7623 30.5953 33.001 30.5953 33.25C30.5953 33.4989 30.4734 33.7377 30.2562 33.9137C30.0391 34.0898 29.7447 34.1886 29.4376 34.1886C29.1306 34.1886 28.8361 34.0898 28.619 33.9137L14.744 22.6637C14.6363 22.5766 14.5509 22.4732 14.4926 22.3593C14.4343 22.2454 14.4043 22.1233 14.4043 22C14.4043 21.8767 14.4343 21.7546 14.4926 21.6407C14.5509 21.5268 14.6363 21.4233 14.744 21.3362L28.619 10.0862C28.7264 9.99891 28.854 9.92964 28.9945 9.88238C29.1349 9.83512 29.2855 9.81079 29.4376 9.81079C29.5897 9.81079 29.7403 9.83512 29.8808 9.88238C30.0212 9.92964 30.1488 9.99891 30.2562 10.0862Z" fill="white"/>
                            </svg>
                        </button>
                        <p class="mb-0 course-title">{{ translate($course_title) }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="mb-0 me-2">{{ __('Your progress') }}: <span>{{ $complete_lessons_count }}</span> of <span>{{ $lessons_count }} </span>({{ $progress_percent }}%)</p>
                        <button class="btn btn-custom-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M25.9762 4.02372C26.0635 4.1108 26.1328 4.21426 26.18 4.32815C26.2273 4.44205 26.2516 4.56415 26.2516 4.68747C26.2516 4.81078 26.2273 4.93288 26.18 5.04678C26.1328 5.16068 26.0635 5.26413 25.9762 5.35122L5.35121 25.9762C5.17518 26.1523 4.93642 26.2511 4.68746 26.2511C4.43851 26.2511 4.19975 26.1523 4.02371 25.9762C3.84768 25.8002 3.74878 25.5614 3.74878 25.3125C3.74878 25.0635 3.84768 24.8248 4.02371 24.6487L24.6487 4.02372C24.7358 3.93641 24.8393 3.86714 24.9531 3.81988C25.067 3.77262 25.1891 3.74829 25.3125 3.74829C25.4358 3.74829 25.5579 3.77262 25.6718 3.81988C25.7857 3.86714 25.8891 3.93641 25.9762 4.02372Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.02372 4.02372C3.93641 4.1108 3.86714 4.21426 3.81988 4.32815C3.77262 4.44205 3.74829 4.56415 3.74829 4.68747C3.74829 4.81078 3.77262 4.93288 3.81988 5.04678C3.86714 5.16068 3.93641 5.26413 4.02372 5.35122L24.6487 25.9762C24.8248 26.1523 25.0635 26.2511 25.3125 26.2511C25.5614 26.2511 25.8002 26.1523 25.9762 25.9762C26.1523 25.8002 26.2511 25.5614 26.2511 25.3125C26.2511 25.0635 26.1523 24.8248 25.9762 24.6487L5.35122 4.02372C5.26413 3.93641 5.16068 3.86714 5.04678 3.81988C4.93288 3.77262 4.81078 3.74829 4.68747 3.74829C4.56415 3.74829 4.44205 3.77262 4.32815 3.81988C4.21426 3.86714 4.1108 3.93641 4.02372 4.02372Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mt-4"></div>

                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ translate(session('status')) }}
                    </div>
                @endif

                @if($active_lesson)

                    @if($active_lesson->video)

                        <div class="px-lg-5  py-lg-2 p-2">

                            <iframe
                                width="774" height="438"
                                src="{{ $active_lesson->video->video_url }}?badge=0&amp;autopause=0&amp;player_id=0&amp;" 
                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" 
                                title="{{ $active_lesson->title }}">
                            </iframe>

                            {{--
                            <div id="player"></div>

                            <input type="hidden" value="{{ generate_youtube_video_id($active_lesson->video->video_url) }}" id="videoId" />

                            <media-player title="{{ $active_lesson->title }}" src="{{ $active_lesson->video_url }}" playsinline>
                                
                                <media-provider>

                                    @if($active_lesson->subtitles)

                                        @foreach($active_lesson->subtitles as $subtitle)

                                            <track src="{{ $subtitle->subtitle_url }}" kind="subtitles" label="{{ $subtitle->title }}"/>

                                        @endforeach


                                    @endif
                                                    
                                </media-provider>

                                    @if($active_lesson->media_tracker)

                                        <media-video-layout thumbnails="{{ $active_lesson->media_tracker->media_tracker_url }}"></media-video-layout>

                                    @else 

                                        <media-video-layout thumbnails=""></media-video-layout>

                                    @endif

                            </media-player>
                            
                            --}}

                        </div>

                    @endif

                @endif

                <ul class="nav nav-tabs d-flex justify-content-center position-sticky" id="lessonTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.6151 8.20683L16.6655 2.14017C16.4934 1.9647 16.2609 1.8667 16.0183 1.8667H6.40733C5.39588 1.8667 4.57666 2.70203 4.57666 3.73337V24.2667C4.57666 25.298 5.39588 26.1334 6.40733 26.1334H21.0527C22.0641 26.1334 22.8833 25.298 22.8833 24.2667V8.8667C22.8833 8.61937 22.7872 8.3823 22.6151 8.20683ZM16.476 19.6H9.15333C8.64806 19.6 8.23799 19.1819 8.23799 18.6667C8.23799 18.1515 8.64806 17.7334 9.15333 17.7334H16.476C16.9813 17.7334 17.3913 18.1515 17.3913 18.6667C17.3913 19.1819 16.9813 19.6 16.476 19.6ZM18.3067 15.8667H9.15333C8.64806 15.8667 8.23799 15.4486 8.23799 14.9334C8.23799 14.4182 8.64806 14 9.15333 14H18.3067C18.8119 14 19.222 14.4182 19.222 14.9334C19.222 15.4486 18.8119 15.8667 18.3067 15.8667ZM16.476 9.33337C15.9707 9.33337 15.5607 8.91523 15.5607 8.40003V3.64377L21.1405 9.33337H16.476Z" fill="#000"/>
                            </svg>
                            {{ __('Overview') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="exercise-files-tab" data-bs-toggle="tab" data-bs-target="#exercise-files-tab-pane" type="button" role="tab" aria-controls="exercise-files-tab-pane" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30" fill="none">
                                <path d="M7.72314 5.625C7.72314 4.3818 8.17519 3.18951 8.97984 2.31044C9.78449 1.43136 10.8758 0.9375 12.0138 0.9375C13.1517 0.9375 14.2431 1.43136 15.0477 2.31044C15.8523 3.18951 16.3044 4.3818 16.3044 5.625V22.5C16.3044 23.2459 16.0332 23.9613 15.5504 24.4887C15.0676 25.0162 14.4128 25.3125 13.73 25.3125C13.0473 25.3125 12.3925 25.0162 11.9097 24.4887C11.4269 23.9613 11.1556 23.2459 11.1556 22.5V9.375C11.1556 9.12636 11.2461 8.8879 11.407 8.71209C11.5679 8.53627 11.7862 8.4375 12.0138 8.4375C12.2414 8.4375 12.4596 8.53627 12.6206 8.71209C12.7815 8.8879 12.8719 9.12636 12.8719 9.375V22.5C12.8719 22.7486 12.9623 22.9871 13.1232 23.1629C13.2842 23.3387 13.5024 23.4375 13.73 23.4375C13.9576 23.4375 14.1759 23.3387 14.3368 23.1629C14.4977 22.9871 14.5881 22.7486 14.5881 22.5V5.625C14.5881 5.25566 14.5216 4.88993 14.3922 4.5487C14.2628 4.20747 14.0732 3.89743 13.8341 3.63626C13.5951 3.3751 13.3113 3.16793 12.9989 3.02659C12.6866 2.88525 12.3518 2.8125 12.0138 2.8125C11.6757 2.8125 11.3409 2.88525 11.0286 3.02659C10.7163 3.16793 10.4325 3.3751 10.1934 3.63626C9.95436 3.89743 9.76473 4.20747 9.63536 4.5487C9.50598 4.88993 9.43939 5.25566 9.43939 5.625V22.5C9.43939 23.7432 9.89144 24.9355 10.6961 25.8146C11.5007 26.6936 12.5921 27.1875 13.73 27.1875C14.868 27.1875 15.9593 26.6936 16.764 25.8146C17.5686 24.9355 18.0206 23.7432 18.0206 22.5V9.375C18.0206 9.12636 18.1111 8.8879 18.272 8.71209C18.4329 8.53627 18.6512 8.4375 18.8788 8.4375C19.1064 8.4375 19.3246 8.53627 19.4856 8.71209C19.6465 8.8879 19.7369 9.12636 19.7369 9.375V22.5C19.7369 24.2405 19.104 25.9097 17.9775 27.1404C16.851 28.3711 15.3231 29.0625 13.73 29.0625C12.1369 29.0625 10.609 28.3711 9.48252 27.1404C8.35601 25.9097 7.72314 24.2405 7.72314 22.5V5.625Z" fill="black"/>
                            </svg>
                            {{ __('Exercise files') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments-tab-pane" type="button" role="tab" aria-controls="comments-tab-pane" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                <path d="M0 2.61559C0 1.9219 0.26945 1.25661 0.749074 0.76609C1.2287 0.275571 1.87921 0 2.5575 0L17.9025 0C18.5808 0 19.2313 0.275571 19.7109 0.76609C20.1905 1.25661 20.46 1.9219 20.46 2.61559V13.078C20.46 13.7717 20.1905 14.437 19.7109 14.9275C19.2313 15.418 18.5808 15.6936 17.9025 15.6936H5.6444C5.30528 15.6936 4.98008 15.8315 4.74033 16.0767L1.09205 19.8079C1.00271 19.8995 0.888797 19.9619 0.764739 19.9873C0.640681 20.0127 0.512052 19.9998 0.395133 19.9504C0.278214 19.901 0.17826 19.8172 0.107923 19.7096C0.0375858 19.6021 2.68728e-05 19.4756 0 19.3462L0 2.61559ZM4.47563 3.92339C4.30605 3.92339 4.14342 3.99228 4.02352 4.11491C3.90361 4.23754 3.83625 4.40386 3.83625 4.57729C3.83625 4.75071 3.90361 4.91704 4.02352 5.03967C4.14342 5.16229 4.30605 5.23119 4.47563 5.23119H15.9844C16.1539 5.23119 16.3166 5.16229 16.4365 5.03967C16.5564 4.91704 16.6237 4.75071 16.6237 4.57729C16.6237 4.40386 16.5564 4.23754 16.4365 4.11491C16.3166 3.99228 16.1539 3.92339 15.9844 3.92339H4.47563ZM4.47563 7.19288C4.30605 7.19288 4.14342 7.26178 4.02352 7.38441C3.90361 7.50704 3.83625 7.67336 3.83625 7.84678C3.83625 8.02021 3.90361 8.18653 4.02352 8.30916C4.14342 8.43179 4.30605 8.50068 4.47563 8.50068H15.9844C16.1539 8.50068 16.3166 8.43179 16.4365 8.30916C16.5564 8.18653 16.6237 8.02021 16.6237 7.84678C16.6237 7.67336 16.5564 7.50704 16.4365 7.38441C16.3166 7.26178 16.1539 7.19288 15.9844 7.19288H4.47563ZM4.47563 10.4624C4.30605 10.4624 4.14342 10.5313 4.02352 10.6539C3.90361 10.7765 3.83625 10.9428 3.83625 11.1163C3.83625 11.2897 3.90361 11.456 4.02352 11.5787C4.14342 11.7013 4.30605 11.7702 4.47563 11.7702H10.8694C11.0389 11.7702 11.2016 11.7013 11.3215 11.5787C11.4414 11.456 11.5087 11.2897 11.5087 11.1163C11.5087 10.9428 11.4414 10.7765 11.3215 10.6539C11.2016 10.5313 11.0389 10.4624 10.8694 10.4624H4.47563Z" fill="black"/>
                            </svg>
                            {{ __('Comments') }}
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="lessonContent">

                    <div class="tab-pane fade show active px-5 ms-5" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                        <h5 class='mt-5 mb-4 fw-bold text-black'>{{ __('About Lesson') }}</h5>

                       @if($active_lesson)

                        {!!

                            translate($active_lesson->about)

                        !!}

                       @endif

                        <div class="spacer"></div>
                    </div>

                    <div class="tab-pane fade px-5 ms-5" id="exercise-files-tab-pane" role="tabpanel" aria-labelledby="exercise-files-tab" tabindex="0">
                        <h5 class='mt-5 mb-4 fw-bold text-black'>{{ __('Exercise Files') }}</h5>
                        <div class="row row-cols-2 g-2 g-lg-3 mb-5">

                            @if($active_lesson)

                                @foreach($active_lesson->exercise_files as $exercise_file)

                                    <a href="{{ $exercise_file->file_url }}">
                                        <div class="d-flex p-3">
                                            <div>
                                                <p class="mb-0">{{ translate($exercise_file->title) }}</p>
                                            </div>
                                            
                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="ms-3">
                                                <rect width="50" height="50" rx="25" fill="#E7F4F8"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.9469 29.9594C24.0195 30.0321 24.1057 30.0899 24.2006 30.1292C24.2955 30.1686 24.3972 30.1889 24.5 30.1889C24.6028 30.1889 24.7045 30.1686 24.7994 30.1292C24.8944 30.0899 24.9806 30.0321 25.0531 29.9594L28.1781 26.8344C28.2508 26.7617 28.3084 26.6755 28.3477 26.5806C28.387 26.4857 28.4072 26.384 28.4072 26.2812C28.4072 26.1785 28.387 26.0768 28.3477 25.9819C28.3084 25.887 28.2508 25.8008 28.1781 25.7281C28.1055 25.6555 28.0193 25.5979 27.9244 25.5586C27.8295 25.5192 27.7277 25.499 27.625 25.499C27.5223 25.499 27.4206 25.5192 27.3257 25.5586C27.2308 25.5979 27.1445 25.6555 27.0719 25.7281L25.2813 27.5203V21.5938C25.2813 21.3865 25.199 21.1878 25.0524 21.0413C24.9059 20.8948 24.7072 20.8125 24.5 20.8125C24.2928 20.8125 24.0941 20.8948 23.9476 21.0413C23.8011 21.1878 23.7188 21.3865 23.7188 21.5938V27.5203L21.9281 25.7281C21.7814 25.5814 21.5825 25.499 21.375 25.499C21.1675 25.499 20.9686 25.5814 20.8219 25.7281C20.6752 25.8748 20.5928 26.0738 20.5928 26.2812C20.5928 26.4887 20.6752 26.6877 20.8219 26.8344L23.9469 29.9594Z" fill="#1F98B9"/>
                                                <path d="M18.8844 18.2219C20.4461 16.8752 22.4379 16.1315 24.5 16.125C28.7031 16.125 32.1922 19.25 32.5719 23.2797C35.0594 23.6312 37 25.7141 37 28.2703C37 31.0766 34.6594 33.3125 31.8234 33.3125H17.9078C14.6687 33.3125 12 30.7594 12 27.5594C12 24.8047 13.9781 22.5234 16.5969 21.9453C16.8203 20.5969 17.6875 19.2531 18.8844 18.2219ZM19.9047 19.4047C18.7219 20.425 18.1031 21.6547 18.1031 22.6172V23.3172L17.4078 23.3937C15.225 23.6328 13.5625 25.425 13.5625 27.5594C13.5625 29.8516 15.4844 31.75 17.9078 31.75H31.8234C33.8438 31.75 35.4375 30.1687 35.4375 28.2703C35.4375 26.3703 33.8438 24.7891 31.8234 24.7891H31.0422V24.0078C31.0438 20.5391 28.1375 17.6875 24.5 17.6875C22.8123 17.6942 21.1826 18.3022 19.9047 19.4047Z" fill="#1F98B9"/>
                                            </svg>
                                        
                                        </div>
                                    </a>

                                @endforeach

                            @endif

                        </div>
                        <div class="spacer"></div>
                    </div>

                    <div class="tab-pane fade px-5 ms-5" id="comments-tab-pane" role="tabpanel" aria-labelledby="comments-tab" tabindex="0">
                        <h5 class='mt-5 mb-5 fw-bold text-black'>{{ __('Join the conversation') }}</h5>

                        <div class="add-comment-wrapper mb-4">
                            <img src="{{ Auth::user()->profile_img_url }}" alt="user-profile"/>
                            <div class="w-100">
                                <input type="hidden" name="lesson_id" value="{{ $active_lesson ? $active_lesson->id : '' }}" id="lessonId">
                                <textarea class="form-control mb-4 w-100" placeholder="{{ __('Write your comment here...') }}" name="comment" rows="4" id="comment"></textarea>
                                <button class="btn btn-success" id="addCommentBtn">{{ __('SUBMIT') }}</button>
                            </div>
                        </div>

                        <div id="commentsWrapper">

                            @if($comments)

                                @foreach($comments as $comment)

                                    <div class="comment-wrapper mb-4">
                                        <img src="{{ $comment->user->profile_img_url }}" alt="user-profile"/>
                                        <div class="comment">
                                            <div class="d-flex comment-header">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 me-3">{{ $comment->user->name }}</p>
                                                    <span>{{ time_since($comment->created_at) }}</span>
                                                </div>
                                                <button class="btn reply-btn" data-js-comment-id="{{ $comment->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                        <path d="M7.57132 14.875L1.72999 10.775C1.59241 10.6955 1.47839 10.5824 1.39918 10.4467C1.31998 10.311 1.27832 10.1575 1.27832 10.0013C1.27832 9.84505 1.31998 9.69152 1.39918 9.55584C1.47839 9.42015 1.59241 9.30699 1.72999 9.22752L7.57132 5.12502C7.71057 5.04496 7.869 5.00233 8.03055 5.00148C8.19209 5.00062 8.35099 5.04156 8.49111 5.12014C8.63124 5.19872 8.7476 5.31214 8.82839 5.44889C8.90917 5.58564 8.95151 5.74085 8.95109 5.89877V7.50002C10.8692 7.50002 16.6236 7.50002 17.9023 17.5C14.7055 11.875 8.95109 12.5 8.95109 12.5V14.1013C8.95109 14.8013 8.17617 15.2238 7.57132 14.8763V14.875Z" fill="#555555"/>
                                                    </svg>
                                                    {{ __('Reply') }}
                                                </button>
                                            </div>
                                            <p>{{ translate($comment->comment) }}</p>
                                        </div>
                                    </div>

                                    @foreach($comment->replies as $reply) 

                                        <div class="reply-wrapper mb-4">
                                            <img src="/assets/img/PersonCircle.png" alt="user-profile"/>
                                            <div class="reply">
                                                <div class="d-flex reply-header">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 me-3">{{ $reply->user->name }}</p>
                                                        <span>{{ time_since($reply->created_at) }}</span>
                                                    </div>
                                                </div>
                                                <p>{{ translate($reply->reply) }}</p>
                                            </div>
                                        </div>
                                
                                    @endforeach

                                @endforeach
                                
                            @endif

                        </div>

                        <div class="add-comment-wrapper mb-4 reply" id="addReplyHTML">
                            <img src="{{ Auth::user()->profile_img_url }}" alt="user-profile"/>
                            <div class="w-100">
                                <input type="hidden" value="" id="commentId"/>
                                <textarea class="form-control mb-4 w-100" placeholder="{{ __('Write your comment here...') }}" name="comment" rows="4" id="reply"></textarea>
                                <button class="btn btn-success" id="addReplyBtn">{{ __('REPLY') }}</button>
                            </div>
                        </div>

                    </div>
                </div>

                @if($active_lesson)

                    <div class="footer">

                            @php 

                                $current_lesson_id = $active_lesson->id;

                                $current_lesson_key = array_search($current_lesson_id, $lessons_array);

                                $next_lesson_key = $current_lesson_key + 1;

                                $previous_lesson_key = $current_lesson_key > 0 ? ( $current_lesson_key - 1 ) : 0;
                                
                            @endphp

                        <div class="d-flex">

                            @if($current_lesson_key == 0 && $previous_lesson_key == 0)
                            
                                <button disabled class="btn btn-prev me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 5.14325C16 4.99171 15.9398 4.84637 15.8326 4.73922C15.7255 4.63206 15.5802 4.57186 15.4286 4.57186H1.95175L5.5481 0.97666C5.60122 0.923534 5.64336 0.860465 5.67211 0.791053C5.70087 0.721641 5.71566 0.647245 5.71566 0.572114C5.71566 0.496983 5.70087 0.422587 5.67211 0.353175C5.64336 0.283763 5.60122 0.220694 5.5481 0.167568C5.49497 0.114442 5.4319 0.072301 5.36249 0.0435496C5.29308 0.0147982 5.21868 0 5.14355 0C5.06842 0 4.99402 0.0147982 4.92461 0.0435496C4.8552 0.072301 4.79213 0.114442 4.739 0.167568L0.167868 4.7387C0.114656 4.79178 0.0724385 4.85484 0.0436329 4.92425C0.0148274 4.99367 0 5.06809 0 5.14325C0 5.21841 0.0148274 5.29283 0.0436329 5.36225C0.0724385 5.43166 0.114656 5.49472 0.167868 5.5478L4.739 10.1189C4.79213 10.1721 4.8552 10.2142 4.92461 10.243C4.99402 10.2717 5.06842 10.2865 5.14355 10.2865C5.21868 10.2865 5.29308 10.2717 5.36249 10.243C5.4319 10.2142 5.49497 10.1721 5.5481 10.1189C5.60122 10.0658 5.64336 10.0027 5.67211 9.93333C5.70087 9.86391 5.71566 9.78952 5.71566 9.71439C5.71566 9.63926 5.70087 9.56486 5.67211 9.49545C5.64336 9.42604 5.60122 9.36297 5.5481 9.30984L1.95175 5.71464H15.4286C15.5802 5.71464 15.7255 5.65444 15.8326 5.54729C15.9398 5.44013 16 5.29479 16 5.14325Z" fill="#309FBE"/>
                                    </svg>
                                    {{ __('Previous') }}
                                </button>

                            @else 

                                <a href="{{ route('lesson-page', ['course_id' => $course_id, 'lesson_id' =>  $lessons_array[$previous_lesson_key] ]) }}" class="btn btn-prev me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 5.14325C16 4.99171 15.9398 4.84637 15.8326 4.73922C15.7255 4.63206 15.5802 4.57186 15.4286 4.57186H1.95175L5.5481 0.97666C5.60122 0.923534 5.64336 0.860465 5.67211 0.791053C5.70087 0.721641 5.71566 0.647245 5.71566 0.572114C5.71566 0.496983 5.70087 0.422587 5.67211 0.353175C5.64336 0.283763 5.60122 0.220694 5.5481 0.167568C5.49497 0.114442 5.4319 0.072301 5.36249 0.0435496C5.29308 0.0147982 5.21868 0 5.14355 0C5.06842 0 4.99402 0.0147982 4.92461 0.0435496C4.8552 0.072301 4.79213 0.114442 4.739 0.167568L0.167868 4.7387C0.114656 4.79178 0.0724385 4.85484 0.0436329 4.92425C0.0148274 4.99367 0 5.06809 0 5.14325C0 5.21841 0.0148274 5.29283 0.0436329 5.36225C0.0724385 5.43166 0.114656 5.49472 0.167868 5.5478L4.739 10.1189C4.79213 10.1721 4.8552 10.2142 4.92461 10.243C4.99402 10.2717 5.06842 10.2865 5.14355 10.2865C5.21868 10.2865 5.29308 10.2717 5.36249 10.243C5.4319 10.2142 5.49497 10.1721 5.5481 10.1189C5.60122 10.0658 5.64336 10.0027 5.67211 9.93333C5.70087 9.86391 5.71566 9.78952 5.71566 9.71439C5.71566 9.63926 5.70087 9.56486 5.67211 9.49545C5.64336 9.42604 5.60122 9.36297 5.5481 9.30984L1.95175 5.71464H15.4286C15.5802 5.71464 15.7255 5.65444 15.8326 5.54729C15.9398 5.44013 16 5.29479 16 5.14325Z" fill="#309FBE"/>
                                    </svg>
                                    {{ __('Previous') }}
                                </a>

                            @endif

                            @if($next_lesson_key < sizeof($lessons_array))

                                <a href="{{ route('lesson-page', ['course_id' => $course_id, 'lesson_id' => $lessons_array[ $next_lesson_key == sizeof($lessons_array) ? sizeof($lessons_array) - 1 : $next_lesson_key ] ]) }}" class="btn btn-next" id="nextLessonBtn">
                                    {{ __('Next') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.14325C0 5.29479 0.0601988 5.44013 0.167356 5.54728C0.274512 5.65444 0.419849 5.71464 0.571392 5.71464L14.0482 5.71464L10.4519 9.30984C10.3988 9.36297 10.3566 9.42603 10.3279 9.49545C10.2991 9.56486 10.2843 9.63925 10.2843 9.71439C10.2843 9.78952 10.2991 9.86391 10.3279 9.93332C10.3566 10.0027 10.3988 10.0658 10.4519 10.1189C10.505 10.1721 10.5681 10.2142 10.6375 10.2429C10.7069 10.2717 10.7813 10.2865 10.8564 10.2865C10.9316 10.2865 11.006 10.2717 11.0754 10.2429C11.1448 10.2142 11.2079 10.1721 11.261 10.1189L15.8321 5.54779C15.8853 5.49472 15.9276 5.43166 15.9564 5.36224C15.9852 5.29283 16 5.21841 16 5.14325C16 5.06809 15.9852 4.99367 15.9564 4.92425C15.9276 4.85483 15.8853 4.79178 15.8321 4.7387L11.261 0.167565C11.2079 0.11444 11.1448 0.072298 11.0754 0.0435467C11.006 0.0147953 10.9316 -1.90735e-06 10.8564 -1.90735e-06C10.7813 -1.90735e-06 10.7069 0.0147953 10.6375 0.0435467C10.5681 0.072298 10.505 0.11444 10.4519 0.167565C10.3988 0.220692 10.3566 0.283761 10.3279 0.353172C10.2991 0.422585 10.2843 0.496981 10.2843 0.572111C10.2843 0.647243 10.2991 0.721639 10.3279 0.79105C10.3566 0.860462 10.3988 0.923532 10.4519 0.976657L14.0482 4.57186L0.571392 4.57186C0.419849 4.57186 0.274512 4.63206 0.167356 4.73921C0.0601988 4.84637 0 4.99171 0 5.14325Z" fill="#309FBE"/>
                                    </svg>
                                </a>

                            @else 

                                @if(!($complete_lessons_count == $lessons_count)) 

                                    <a href="{{ route('lesson-page', ['course_id' => $course_id, 'lesson_id' => $lessons_array[$next_lesson_key == sizeof($lessons_array) ? sizeof($lessons_array) - 1 : $next_lesson_key] ]) }}" class="btn btn-next" id="nextLessonBtn">
                                    {{ __('Finish') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.14325C0 5.29479 0.0601988 5.44013 0.167356 5.54728C0.274512 5.65444 0.419849 5.71464 0.571392 5.71464L14.0482 5.71464L10.4519 9.30984C10.3988 9.36297 10.3566 9.42603 10.3279 9.49545C10.2991 9.56486 10.2843 9.63925 10.2843 9.71439C10.2843 9.78952 10.2991 9.86391 10.3279 9.93332C10.3566 10.0027 10.3988 10.0658 10.4519 10.1189C10.505 10.1721 10.5681 10.2142 10.6375 10.2429C10.7069 10.2717 10.7813 10.2865 10.8564 10.2865C10.9316 10.2865 11.006 10.2717 11.0754 10.2429C11.1448 10.2142 11.2079 10.1721 11.261 10.1189L15.8321 5.54779C15.8853 5.49472 15.9276 5.43166 15.9564 5.36224C15.9852 5.29283 16 5.21841 16 5.14325C16 5.06809 15.9852 4.99367 15.9564 4.92425C15.9276 4.85483 15.8853 4.79178 15.8321 4.7387L11.261 0.167565C11.2079 0.11444 11.1448 0.072298 11.0754 0.0435467C11.006 0.0147953 10.9316 -1.90735e-06 10.8564 -1.90735e-06C10.7813 -1.90735e-06 10.7069 0.0147953 10.6375 0.0435467C10.5681 0.072298 10.505 0.11444 10.4519 0.167565C10.3988 0.220692 10.3566 0.283761 10.3279 0.353172C10.2991 0.422585 10.2843 0.496981 10.2843 0.572111C10.2843 0.647243 10.2991 0.721639 10.3279 0.79105C10.3566 0.860462 10.3988 0.923532 10.4519 0.976657L14.0482 4.57186L0.571392 4.57186C0.419849 4.57186 0.274512 4.63206 0.167356 4.73921C0.0601988 4.84637 0 4.99171 0 5.14325Z" fill="#309FBE"/>
                                        </svg>
                                    </a>

                                @else 

                                    <button class="btn btn-next">
                                        <span class="me-2">🎉</span>
                                        {{ __('Completed') }}
                                      
                                    </button>

                                @endif

                            @endif

                        </div>
                    </div>

                @endif

            </div>
        </div>

    </main>

@endsection

@section('scripts')

    <script>   
    
        $(document).ready(() => {


            let videoProgressObj;
            let _videoTimeInterval;
            let lessonId = <?php echo $active_lesson->id ?>;
            // let videoDuration;

            // const player = document.querySelector('media-player');

            if(sessionStorage.getItem("videoProgress")) {

                videoProgressObj = sessionStorage.getItem("videoProgress");

            }
            else {

                sessionStorage.setItem('videoProgress', JSON.stringify([]));

                videoProgressObj = sessionStorage.getItem("videoProgress");
            }

            if(player) {

                player.addEventListener('loaded-data', (event) => {

                    videoDuration = player.state.duration;

                    commonObj.initVideo(player, lessonId, videoProgressObj);

                })

                player.addEventListener('ended', (event) => {

                    _clearVideoTimeInterval = clearInterval(_videoTimeInterval);

                    commonObj.storeVideoProgress(player, lessonId, videoProgressObj);

                });

                player.addEventListener('pause', (event) => {

                    _clearVideoTimeInterval = clearInterval(_videoTimeInterval);

                });

                player.addEventListener('playing', (event) => {

                    _videoTimeInterval = setInterval(() => {

                        commonObj.storeVideoProgress(player, lessonId, videoProgressObj);

                    }, 5000);

                });

            }

            $(ext.jsId.nextLessonBtn).on('click', (e) => {

                e.preventDefault();
               
                commonObj.getNextLesson(e, lessonId, videoDuration);

            });

            $(ext.jsId.addReplyBtn).on('click', function() {

                commonObj.addReply();

            });

            $(ext.jsId.addCommentBtn).on('click', function() {


                commonObj.addComment();

            });

            $(ext.classes.closeLessonBtn).on("click", function () {
            
                location.href = "{{ route('course-page', ['course_id' => $course_id ]) }}";

            });

        });
        

    </script>

@endsection