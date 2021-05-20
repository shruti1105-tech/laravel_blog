@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('Admin/plugins/select2/css/select2.min.css') }}">

@endsection
@section('main-content')

    <!-- Content Wrapper. Contains page content -->

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
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titles</h3>
                        </div>

                        @include('includes.messages')

                        <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Post title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Enter title" value="{{ $post->title }}">

                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Post Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                           placeholder="Enter subtitle" value="{{ $post->subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Post Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                           placeholder="Enter slug" value="{{ $post->slug }}">
                                </div>

                                <div class="form-group">
                                    <label for="image">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                   name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="status"
                                           @if ($post->status == 1) {{'checked'}} @endif>
                                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                                </div><br>
                                <div class="form-group" data-select2-id="56">
                                    <label>Select Tags</label>
                                    <select class="select2 select2-hidden-accessible" multiple=""
                                            data-placeholder="Select a Tag" style="width: 100%;" data-select2-id="9"
                                            tabindex="-1" aria-hidden="true" name="tags[]">

                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                    @foreach ($post->tags as $postTag)
                                                        @if($postTag->id == $tag->id)
                                                            selected
                                                        @endif
                                                    @endforeach
                                            >{{ $tag->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group" data-select2-id="56">
                                    <label>Select Category</label>
                                    <select class="select2 select2-hidden-accessible" multiple=""
                                            data-placeholder="Select a Category" style="width: 100%;" data-select2-id="10"
                                            tabindex="-1" aria-hidden="true" name="categories[]">

                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @foreach ($post->categories as $postCategory)
                                                        @if($postCategory->id == $category->id)
                                                            selected
                                                        @endif
                                                    @endforeach
                                            >{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="card card-outline card-white">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Write Post Body Here
                                    </h3>
                                </div>

                                <div class="card-body">
                                  <textarea id="summernote" style="width: 100%; height: 500px;" class="form-control" name="body">
                                    {{ $post->body }}
                                  </textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
@section('footerSection')
    <script src="{{ asset('Admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
