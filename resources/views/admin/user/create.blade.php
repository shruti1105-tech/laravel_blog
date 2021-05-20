@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1>Text Editors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Text Editors</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Admin</h3>
                        </div>
                    @include('includes.messages')
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route ('user.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="User Name" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                               placeholder="Email" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               placeholder="Phone" value="{{ old('phone') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                               placeholder="Password" value="{{ old('password') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                               placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Status</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="status" @if (old('status') == 1) checked @endif value="1"> Status</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label>Assign Role</label>
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-lg-3">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route ('user.index') }}" class="btn btn-warning">Back</a>

                                </div>
                        </form>
                    </div>

                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>


@endsection