@extends('admin.layouts.main-layout')

@section('main-content')

      <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Announcements</h1>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary mb-4">Add Announcement</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">

            {{session('success')}}
            
        </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Announcements</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Announcement</th>
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
                data: <?php echo json_encode($announcements); ?>,
                "columns": [
                    { "data": null },
                    { "data": null },
                ],
                "columnDefs": [
                    {
                        render: function (data, type, row) {
                            return `<p class="mb-0">${data.announcement}</p><small class="text-muted">Course: ${ data.course.title }</small>`;
                        },
                        targets: [0]
                    },
                    {
                        render: function (data, type, row) {
                            return `
                                <div class="d-flex align-items-center">

                                    <a href="/admin/announcements/${ data.id }/edit" class="btn btn-warning btn-square mr-3">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>

                                    <form method="POST" action="/admin/announcements/${data.id}">
                                        @method('DELETE')
                                        @csrf
                                    
                                        <button type="submit" class="btn btn-danger btn-square mr-3">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </form>

                                </div>
                            `;
                        },
                        targets: [1]
                    }
                ]
            });
            
        });

    </script>

@endsection