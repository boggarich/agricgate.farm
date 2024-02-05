@extends('admin.layouts.main-layout')

@section('main-content')

      <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Questions & Answers</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">

            {{session('success')}}
            
        </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Questions & Answers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Question</th>
                            <th>Answer</th>
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
                data: <?php echo json_encode($questions); ?>,
                "columns": [
                    { "data": null },
                    { "data": "question" },
                    { "data": "answer" },
                    { "data": null },
                ],
                "columnDefs": [
                    {
                        render: function (data, type, row) {
                            return `<p class="mb-0">${ data.user.name }</p><small class="text-muted">${ data.user.email }</small>`;
                        },
                        targets: [0]
                    },
                    {
                        render: function (data, type, row) {
                            return `
                                <div class="d-flex align-items-center">

                                    <a href="/admin/questions/${ data.id }/edit" class="btn btn-success btn-square mr-3">
                                        <i class="fas fa-fw fa-paper-plane"></i>
                                    </a>

                                    <form method="POST" action="/admin/questions/${data.id}">
                                        @method('DELETE')
                                        @csrf
                                    
                                        <button type="submit" class="btn btn-danger btn-square mr-3">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </form>

                                </div>
                            `;
                        },
                        targets: [3]
                    }
                ]
            });
            
        });

    </script>

@endsection