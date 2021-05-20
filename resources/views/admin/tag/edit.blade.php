@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper">
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
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Titles</h2>
                        </div>
                        @include('includes.messages')
                        <form action="{{route('tag.update',$tag->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Tag title</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter title" value="{{ $tag->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Tag Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="{{ $tag->slug }}">
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('tag.index') }}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
