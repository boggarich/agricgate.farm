@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Courses</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Course</h6>
        </div>
        <div class="card-body">

            <form id="addCourseForm" class="row g-3" action="{{ route('admin.courses.store') }}" method="post">
                @csrf
                <div class="col-lg-6 form-group">
                    <label>Category</label>
                    <select class="form-control select2" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach

                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ old('title') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="inputEmail4" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">About</label>
                    <div id="editor" class="w-100 mt-10 bg-white mb-4">
                    {!! old('about') !!}
                    </div>
                    <input type="hidden" value="{{ old('about') }}" id="editorInput" name="about">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">What will you learn?</label>
                    <textarea type="text" class="form-control" id="inputEmail4" name="what_will_you_learn" 
                    placeholder="Separate each with a new line.">{{ old('what_will_you_learn') }}</textarea>
                </div>
                
                <div class="col-md-12">

                    <label for="inputEmail4" class="form-label">Duration</label>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Hours" name="hours" value="{{ old('hours') }}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Mins" name="mins" value="{{ old('mins') }}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Secs" name="secs" value="{{ old('secs') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="video_url" value="" id="videoURL"/>
                <input type="hidden" name="featured_img_url" value="" id="featuredImgURL"/>

            </form>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Video</label>
                    <form
                    class="dropzone"
                    id="video-dropzone"></form>
                </div>
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Featured Image</label>
                    <form
                    class="dropzone"
                    id="featured-img-dropzone"></form>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary" form="addCourseForm">Add Course</button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection