@extends('admin.layouts.main-layout')

@section('main-content')

      <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Courses</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-4">Add Course</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">

            {{session('success')}}
            
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="row">

        <div class="col-md-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Subtitle</h6>
                </div>
                <div class="card-body">

                    <form id="addSubtitleForm" class="row g-3" action="{{ route('admin.subtitles.store') }}" method="post">
                        @csrf
                        
                        <div class="col-lg-12 form-group">
                            <label>Course</label>
                            <select class="form-control select2" name="subtitleable_id">

                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="inputEmail4" class="form-label">Title ( Eg. English, Twi, French )</label>
                            <input type="text" class="form-control" id="inputEmail4" name="title" value="{{ old('title') }}">
                        </div>

                        <input type="hidden" name="subtitle_url" value="" id="subtitleURL"/>
                        <input type="hidden" name="subtitleable_type" value="App\Models\Course">

                    </form>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="inputEmail4" class="form-label">Subtitle</label>
                            <form
                            class="dropzone"
                            id="subtitle-dropzone"></form>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3 mb-4">
                        <button type="submit" class="btn btn-primary" form="addSubtitleForm">Add Subtitle</button>
                    </div>
                    

                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Media Tracker</h6>
                </div>
                <div class="card-body">

                    <form id="addMediaTrackerForm" class="row g-3" action="{{ route('admin.media-trackers.store') }}" method="post">
                        @csrf
                        <div class="col-lg-12 form-group">
                            <label>Course</label>
                            <select class="form-control select2" name="media_trackerable_id">

                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach

                            </select>
                        </div>

                        
                        <input type="hidden" name="media_tracker_url" value="" id="mediaTrackerURL"/>
                        <input type="hidden" name="media_trackerable_type" value="App\Models\Course">

                    </form>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="inputEmail4" class="form-label">Media Tracker</label>
                            <form
                            class="dropzone"
                            id="media-tracker-dropzone"></form>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3 mb-4">
                        <button type="submit" class="btn btn-primary" form="addMediaTrackerForm">Add Media Tracker</button>
                    </div>
                    

                </div>
            </div>
        </div>

    </div> -->


@endsection

@section('scripts')

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            $('#dataTable').DataTable({
                data: <?php echo json_encode($courses); ?>,
                "columns": [
                    { "data": null },
                    { "data": "description" },
                    { "data": null },
                ],
                "columnDefs": [
                    {
                        render: function (data, type, row) {
                            return `<p>${ data.title }</p><small class="text-muted">Category: ${ data.category.title }</small>`;
                        },
                        targets: [0]
                    },
                    {
                        render: function (data, type, row) {
                            return `
                                <div class="d-flex align-items-center">
                                    
                                    ${ data.published_at ? 
                                        
                                    `<form method="POST" action="/admin/courses/${data.id}/unpublish">
                                        @method('PUT')
                                        @csrf
                                    
                                        <button type="submit" class="btn btn-secondary btn-square mr-3 publish-btn">
                                                Unpublish
                                        </button>

                                    </form>` : 
                                        
                                    `<form method="POST" action="/admin/courses/${data.id}/publish">
                                        @method('PUT')
                                        @csrf
                                    
                                        <button type="submit" class="btn btn-primary btn-square mr-3 unpublish-btn">
                                                Publish
                                        </button>

                                    </form>` 

                                    }

                                    ${

                                        data.featured ? 
                                            `<form method="POST" action="/admin/featured-courses/${data.id}">
                                                @method('DELETE')
                                                @csrf
                                            
                                                <button type="submit" class="btn btn-secondary btn-square mr-3">
                                                    <i class="fas fa-fw fa-desktop"></i>
                                                </button>

                                            </form>` :

                                            `<form method="POST" action="/admin/featured-courses">
                                                @method('POST')
                                                @csrf
                                                <input type="hidden" name="course_id" value="${data.id}"/>
                                                <button type="submit" class="btn btn-info btn-square mr-3">
                                                    <i class="fas fa-fw fa-desktop"></i>
                                                </button>

                                            </form>`

                                    }

                                    <a href="/admin/courses/${ data.id }" class="btn btn-success btn-square mr-3">
                                        <i class="fas fa-fw fa-eye"></i>
                                    </a>

                                    <a href="/admin/courses/${ data.id }/edit" class="btn btn-warning btn-square mr-3">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>

                                    <form method="POST" action="/admin/courses/${data.id}">
                                        @method('DELETE')
                                        @csrf
                                    
                                        <button type="submit" class="btn btn-danger btn-square mr-3">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </form>

                                </div>
                            `;
                        },
                        targets: [2]
                    }
                ]
            });
            
        });

    </script>

@endsection