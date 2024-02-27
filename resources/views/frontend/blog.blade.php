@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container">

            <div class="blog-post-wrapper pt-3">

                <h1 class="my-5 fw-600">{{ $blog->title }}</h1>
                
                {!!  $blog->blog !!}

                <div class="spacer"></div>

            </div>

        </div>  

    </main>

@endsection