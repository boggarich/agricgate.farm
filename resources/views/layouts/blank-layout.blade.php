<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Course for farming">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Trisolace | Learn everything about farming</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/theme.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/layouts/video.min.css" />
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <link href="/assets/css/global.css" rel="stylesheet" />

    </head>

    <body class="antialiased">

        @yield('main-content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/cdn/with-layouts/vidstack.js" type="module"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/ui.js') }}" defer></script>
        <script src="{{ asset('assets/js/common.js') }}"></script>

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
        </script>

        <script>
            
            let ext = {
                jsId: {
                    videoId: '#videoId',
                    addReplyHTML: '#addReplyHTML',
                    addReplyBtn: '#addReplyBtn',
                    commentId: '#commentId',
                    reply: '#reply',
                    nextLessonBtn: '#nextLessonBtn',
                    commentsWrapper: '#commentsWrapper',
                    comment: '#comment',
                    lessonId: '#lessonId',
                    addCommentBtn: '#addCommentBtn',
                },
                classes: {
                    closeLessonBtn: '.btn-custom-close',
                },
                url: {
                    addReply: "{{ route('add-reply') }}",
                    addComment: "{{ route('add-comment') }}",
                }
            }

            let commonObj = new commonClass(ext);

        </script>

        @yield('scripts')

    </body>

</html>