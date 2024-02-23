@extends('admin.layouts.main-layout')

@section('main-content')

      <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Exercise Files</h1>
        <a href="{{ route('admin.exercise-files.create') }}" class="btn btn-primary mb-4">Add Exercise Files</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">

            {{session('success')}}
            
        </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exercise files</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lesson</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            $('#dataTable').DataTable({
                data: <?php echo json_encode($exercise_files); ?>,
                "columns": [
                    {"data": "lesson.title"},
                    { "data": "title" },
                    { "data": null },
                ],
                "columnDefs": [
                    {
                        render: function (data, type, row) {
                            return `
                                <div class="d-flex align-items-center">

                                    <form method="POST" action="/admin/exercise-files/${data.id}">
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