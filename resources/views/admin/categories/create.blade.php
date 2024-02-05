@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Categories</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
        </div>
        <div class="card-body">

            <form id="addCategoryForm" class="row g-3" action="{{ route('admin.categories.store') }}" method="post">
                @csrf

                <div class="col-md-12 form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ old('title') }}">
                </div>

                <input type="hidden" name="featured_img_url" value="" id="featuredImgURL"/>

            </form>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Featured Image</label>
                    <form
                    class="dropzone"
                    id="featured-img-dropzone"></form>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary" form="addCategoryForm">Add Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection