@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Lessons</h1>
        <p class="mr-3">{{ date("M") }} {{ date("d") }}, {{ date("Y") }}</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Lesson</h6>
        </div>
        <div class="card-body">

            <form id="addTopicForm" class="row g-3" action="{{ route('admin.lessons.update', ['lesson' => $lesson->id] ) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-lg-6 form-group">
                    <label>Topic</label>
                    <select class="form-control select2" name="topic_id">

                    @foreach($topics as $topic)
                        <option value="{{ $topic->id }}" @selected($lesson->topic_id == $topic->id)>{{ $topic->title }}</option>
                    @endforeach

                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ $lesson->title }}">
                </div>
                
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">About</label>
                    <div id="editor" class="w-100 mt-10 bg-white mb-4">
                    {!! $lesson->about !!}
                    </div>
                    <input type="hidden" value="{{ $lesson->about }}" id="editorInput" name="about">
                </div>

                <div class="col-lg-6 form-group">
                    <label>Select language to add video URL</label>
                    <select class="form-control select2" name="locale" id="locale">
                            <option @selected(true)>Select language</option>
                        @foreach($locales as $locale)
                            <option value="{{ $locale->shortcode }}">{{ $locale->language }}</option>
                        @endforeach

                    </select>
                </div>

                <div id="video-url-wrapper">

                    @if($lesson->videos)

                        @foreach($lesson->videos as $video)

                            <div class="col-md-6 form-group">
                                <label for="inputEmail4" class="form-label">Video URL ({{  App\Models\Locale::where('shortcode', $video->locale)->first()->language }})</label>
                                <input type="text" class="form-control video-url" name="video_urls[]" value="{{ $video->locale . '::' . $video->video_url }}" id="{{ $video->locale }}"/>
                            </div>
                            <div class="col-md-6 form-group"></div>

                        @endforeach

                    @endif


                </div>

                <input type="hidden" name="featured_img_url" value="{{ $lesson->featured_img_url }}" id="featuredImgURL"/>

            </form>

            <div class="row mt-3">
                <!-- <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Video</label>
                    <form
                    class="dropzone"
                    id="video-dropzone"></form>
                </div> -->
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Featured Image</label>
                    <form
                    class="dropzone"
                    id="featured-img-dropzone"></form>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary" form="addTopicForm">Update Lesson</button>
                <a href="{{ route('admin.lessons.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection