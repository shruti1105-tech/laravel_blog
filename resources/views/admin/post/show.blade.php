@extends('admin.layouts.app')

@section('headSection')

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

@endsection

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @include('admin.layouts.pageHead')
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                        @can('posts.create',Auth::user())
                            <a class='col-lg-offset-5  btn btn-success' href="{{route('post.create')}}">Add New</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    @can('posts.update',Auth::user())
                                        <th>Edit</th>
                                    @endcan
                                    @can('posts.delete',Auth::user())
                                        <th>Delete</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->subtitle }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        @can('posts.update',Auth::user())
                                            <td><a href="{{route('post.edit',$post->id)}}"><span class="fa fa-edit"></span></a>
                                            </td>
                                        @endcan

                                        @can('posts.delete',Auth::user())
                                            <td>
                                                <form id="delete-form-{{ $post->id }}" method="post" style="display: none"
                                                      action="{{ route ('post.destroy',$post->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                                <a href="" onclick="
                                                        if(confirm('Are you sure,You Want to delete this?'))
                                                        {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $post->id }}').submit();
                                                        }
                                                        else {
                                                            event.preventDefault();
                                                        }">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    @can('posts.update',Auth::user())
                                        <th>Edit</th>
                                    @endcan
                                    @can('posts.delete',Auth::user())
                                        <th>Delete</th>
                                    @endcan
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')

    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>


    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>

@endsection