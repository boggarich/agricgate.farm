@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Exercise Files</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Exercise Files</h6>
        </div>
        <div class="card-body">

            <form id="addExerciseFilesForm" class="row g-3" action="{{ route('admin.exercise-files.store') }}" method="post">
                @csrf
                <div class="col-lg-6 form-group">
                    <label>Lesson</label>
                    <select class="form-control select2" name="lesson_id">

                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                    @endforeach

                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ old('title') }}">
                </div>

                <input type="hidden" name="file_url" value="{{ old('file_url') }}" id="exerciseFileURL"/>

            </form>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Exercise files</label>
                    <form
                    class="dropzone"
                    id="exercise-file-dropzone"></form>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary" form="addExerciseFilesForm">Add Exercise Files</button>
                <a href="{{ route('admin.exercise-files.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection