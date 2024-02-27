@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Blogs</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
        </div>
        <div class="card-body">

            <form id="addBlogForm" class="row g-3" action="{{ route('admin.blogs.store') }}" method="post">
                @csrf

                <div class="col-md-12 form-group">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ old('title') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="inputEmail4" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Blog</label>
                    <div id="editor" class="w-100 mt-10 bg-white mb-4">
                    {!! old('blog') !!}
                    </div>
                    <input type="hidden" value="{{ old('blog') }}" id="editorInput" name="blog">
                </div>

                <input type="hidden" name="featured_img_url" value="{{ old('featured_img_url') }}" id="featuredImgURL"/>

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
                <button type="submit" class="btn btn-primary" form="addBlogForm">Add Blog</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection