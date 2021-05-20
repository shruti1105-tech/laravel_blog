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
                            <h3 class="card-title">Edit Admin</h3>
                        </div>
                    @include('includes.messages')
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route ('user.update',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="User Name"
                                               value="@if(old('name')){{ old('name') }}@else{{ $user->name }} @endif" >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                               placeholder="Email"
                                               value="@if(old('email')){{ old('email') }}@else{{ $user->email }} @endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               placeholder="Phone"
                                               value="@if(old('phone')){{ old('phone') }}@else{{ $user->phone }} @endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Status</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="status"
                                                          @if (old('status') == 1 || $user->status == 1)
                                                          checked
                                                          @endif value="1"> Status</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label>Assign Role</label>
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-lg-3">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="role[]" value="{{ $role->id }}"
                                                            @foreach($user->roles as $user_role)
                                                                @if($user_role->id == $role->id)
                                                                    checked
                                                                      @endif
                                                                    @endforeach
                                                            > {{ $role->name }}</label>
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