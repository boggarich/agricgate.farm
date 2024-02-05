@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Topics</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Topic</h6>
        </div>
        <div class="card-body">

            <form id="addTopicForm" class="row g-3" action="{{ route('admin.topics.store') }}" method="post">
                @csrf

                <div class="col-lg-6 form-group">
                    <label>Course</label>
                    <select class="form-control select2" name="course_id">

                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" @selected(old('course_id') == $course->id) >{{ $course->title }}</option>
                    @endforeach

                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ old('title') }}">
                </div>

            </form>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary" form="addTopicForm">Add Topic</button>
                <a href="{{ route('admin.topics.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection