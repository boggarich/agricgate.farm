@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Questions & Answers</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Answer question</h6>
        </div>
        <div class="card-body">

            <div class="col-lg-12">
                <div class="chat-wrapper mt-3">
                    <img src="{{ $question->user->profile_img_url }}" alt="profile image">
                    <div class="chat-bubble">
                        <p>{{ $question->user->name }}</p>
                        <p>{!! $question->question !!}</p>
                    </div>
                </div>
            </div>

            <form id="editQuestionForm" class="row g-3 px-3" action="{{ route('admin.questions.update', [ 'question' => $question->id ]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="col-md-12 answer">
                    <div id="editor" class="w-100 mt-10 bg-white mb-4">{!! $question->answer !!}</div>
                    <input type="hidden" value="" id="editorInput" name="answer">
                    <input type="hidden" value="{{ $question->question }}" name="question" >
                </div>

            </form>

            <div class="d-flex align-items-center justify-content-between px-3">
                <button type="submit" class="btn btn-primary" form="editQuestionForm">Update Question</button>
                <a href="{{ route('admin.questions.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection
