@extends('admin.layouts.auth')

@section('main-content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container col-lg-4 mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center mb-4 mt-3">Login</h5>
                <form action="{{ url('admin/login') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control" name="email" id="exampleFormControlInput3" placeholder="Email">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password" id="exampleFormControlInput4" placeholder="Password">
                    </div>
                    <button class="btn btn-success w-100 mb-4" type="submit">Log in</button>
                </form>
            </div>
        </div>
    </div>

@endsection