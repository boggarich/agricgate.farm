@extends('admin.layouts.main-layout')

@section('main-content')

      <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Users</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">

            {{session('success')}}
            
        </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Registered</th>
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
                data: <?php echo json_encode($users); ?>,
                "columns": [
                    { "data": "name" },
                    { "data": "username" },
                    { "data": "email" },
                    { "data": null },
                ],
                "columnDefs": [
                    {
                        render: function (data, type, row) {

                            let date = new Date(data.created_at);

                            return date.toLocaleString('default', { month: 'short' }) + 
                            " " + date.getDate()  + ", " + date.getFullYear() + ".";

                        },
                        targets: [3]
                    }
                ]
            });
            
        });

    </script>

@endsection