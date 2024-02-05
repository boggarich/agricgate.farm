@extends('admin.layouts.main-layout')


@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 mb-4">Admins</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Admin</h6>
        </div>
        <div class="card-body">

            <form id="addAdminForm" class="row g-3" action="{{ route('admin.admins.store') }}" method="post">
                @csrf

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputEmail4" name="first_name" value="{{ old('first_name') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputEmail4" name="last_name" value="{{ old('last_name') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ old('email') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputEmail4" name="password" value="{{ old('password') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label for="inputEmail4" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputEmail4" name="password_confirmation" value="{{ old('password_confirmation') }}">
                </div>

            </form>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary" form="addAdminForm">Add Admin</button>
                <a href="{{ route('admin.admins.index') }}" class="btn btn-success mb-4">Back</a>

            </div>
            

        </div>
    </div>


@endsection