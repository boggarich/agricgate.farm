<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/player/styles/default/layouts/video.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img src="{{ asset('assets/img/agricgate-farm-logo-3.png') }}" />
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">




            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Charts -->
            <li class="{{ (request()->is('admin')) ? 'active' : '' }} nav-item"">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="{{ (request()->is('admin/categories*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Categories</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="{{ (request()->is('admin/courses*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.courses.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Courses</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="{{ (request()->is('admin/topics*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.topics.index') }}">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Topics</span></a>
            </li>

             <!-- Nav Item - Tables -->
             <li class="{{ (request()->is('admin/lessons*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.lessons.index') }}">
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Lessons</span></a>
            </li>

             <!-- Nav Item - Tables -->
             <li class="{{ (request()->is('admin/questions*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.questions.index') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Questions & Answers</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="{{ (request()->is('admin/announcements*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.announcements.index') }}">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Announcements</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="{{ (request()->is('admin/users*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li  class="{{ (request()->is('admin/admins*')) ? 'active' : '' }} nav-item">
                <a class="nav-link" href="{{ route('admin.admins.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admins</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Auth::user()->profile_img_url }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('main-content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Agricgate.farm {{ date("Y") }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/vidstack@^1.0.0/cdn/with-layouts/vidstack.js" type="module"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart-area.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

     @yield('scripts')

     <script>

            $('.select2').select2();

            let ext = {
                jsId: {
                    mediaTrackerURL: '#mediaTrackerURL',
                    subtitleURL: "#subtitleURL",
                    editorInput: '#editorInput',
                    editor: '#editor',
                    submitBtn: 'button[type=submit]',
                    featuredImgURL: '#featuredImgURL',
                    videoURL: '#videoURL'
                }
            }

            Dropzone.options.mediaTrackerDropzone = {

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.uploads') }}",
                method: "post",
                autoProcessQueue: true,
                maxFiles: 1,
                maxFilesize: 50000000,
                addRemoveLinks: false,
                sending: (file, xhr, formData) => {

                    formData.append("upload_type", "media_tracker");

                    $(ext.jsId.submitBtn).prop('disabled', true);

                },
                success: (file, response) => {

                    $(ext.jsId.mediaTrackerURL).val(response);

                },
                complete: (file, response) => {

                    $(ext.jsId.submitBtn).prop('disabled', false);

                },
                error(file, message) {

                    if (file.previewElement) {

                        file.previewElement.classList.add("dz-error");

                        if (typeof message !== "string") {
                            message = message.message;
                        }

                        for (let node of file.previewElement.querySelectorAll(
                            "[data-dz-errormessage]"
                        )) {
                            node.textContent = message;
                        }
                    }

                },
            };

            Dropzone.options.subtitleDropzone = {

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.uploads') }}",
                method: "post",
                autoProcessQueue: true,
                maxFiles: 1,
                maxFilesize: 50000000,
                uploadMultiple: false,
                addRemoveLinks: true,
                sending: (file, xhr, formData) => {

                    formData.append("upload_type", "subtitle");

                    $(ext.jsId.submitBtn).prop('disabled', true);

                },
                success: (file, response) => {

                    $(ext.jsId.subtitleURL).val(response);

                },
                complete: (file) => {

                    $(ext.jsId.submitBtn).prop('disabled', false);

                },
                error(file, message) {

                    if (file.previewElement) {

                        file.previewElement.classList.add("dz-error");

                        if (typeof message !== "string") {
                            message = message.message;
                        }

                        for (let node of file.previewElement.querySelectorAll(
                            "[data-dz-errormessage]"
                        )) {
                            node.textContent = message;
                        }
                    }

                },
            };

            Dropzone.options.featuredImgDropzone = {

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.uploads') }}",
                method: "post",
                autoProcessQueue: true,
                maxFiles: 1,
                maxFilesize: 50000000,
                acceptedFiles: "image/jpeg,image/gif,image/png,image/svg+xml",
                addRemoveLinks: false,
                sending: (file, xhr, formData) => {

                    formData.append("upload_type", "image");

                    $(ext.jsId.submitBtn).prop('disabled', true);

                },
                success: (file, response) => {

                    $(ext.jsId.featuredImgURL).val(response);

                },
                complete: (file) => {

                    $(ext.jsId.submitBtn).prop('disabled', false);

                },
            };

            Dropzone.options.videoDropzone = {

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.uploads') }}",
                method: "post",
                autoProcessQueue: true,
                maxFiles: 1,
                maxFilesize: 2000000000,
                acceptedFiles: "video/mp4,video/ogg,video/webm,video/mpeg",
                addRemoveLinks: false,
                sending: (file, xhr, formData) => {

                    formData.append("upload_type", "video");

                    $(ext.jsId.submitBtn).prop('disabled', true);

                },
                success: (file, response) => {

                    $(ext.jsId.videoURL).val(response);

                },
                complete: (file) => {

                    $(ext.jsId.submitBtn).prop('disabled', false);

                },
            };

            let options = {
                theme: 'snow',
                formats: [
                    'header',
                    'bold',
                    'italic',
                    'underline',
                    'strike',
                    'blockquote',
                    'list',
                    'bullet',
                    'link',
                    'image',
                    'align',
                    'color',
                    'code-block',
                ],
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['link', 'image'],
                        [{ align: [] }],
                        [{ color: [] }],
                        ['code-block'],
                        ['clean'],
                    ],
                },
            }

            var quill = new Quill(ext.jsId.editor, options);

            quill.on('text-change', (delta, oldDelta, source) => {

                $(ext.jsId.editorInput).val(quill.root.innerHTML);

            });

     </script>

</body>

</html>