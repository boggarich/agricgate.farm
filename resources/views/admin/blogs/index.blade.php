@extends('admin.layouts.main-layout')

@section('main-content')

      <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Blogs</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-4">Add Blog</a>
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
            <h6 class="m-0 font-weight-bold text-primary">All Blogs</h6>
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


@endsection

@section('scripts')

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            $('#dataTable').DataTable({
                data: <?php echo json_encode($blogs); ?>,
                "columns": [
                    { "data": 'title' },
                    { "data": "description" },
                    { "data": null },
                ],
                "columnDefs": [
                    {
                        render: function (data, type, row) {
                            return `<div class="d-flex align-items-center">

                                <a href="/blogs/${ data.id }" class="btn btn-success btn-square mr-3">
                                        <i class="fas fa-fw fa-eye"></i>
                                </a>

                                <a href="/admin/blogs/${ data.id }/edit" class="btn btn-warning btn-square mr-3">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>

                                <form method="POST" action="/admin/blogs/${data.id}">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger btn-square mr-3">
                                        <i class="fas fa-fw fa-times"></i>
                                    </button>
                                </form>

                                </div>`;
                        },
                        targets: [2]
                    }
                ]
            });
            
        });

    </script>

@endsection