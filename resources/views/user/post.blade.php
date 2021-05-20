@extends('user/app')

@section('bg-img',Storage::disk('local')->url($post->image))

@section('title',$post->title)

@section('sub-heading',$post->subtitle)


@section('main-content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=271757984481444&autoLogAppEvents=1" nonce="CUYRc1kP"></script>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <small>Created at {{ $post->created_at->diffForHumans() }}</small>

                    @foreach($post->categories as $category)
                        <small class="float-right" style="margin-right: 10px">
                           <a href="{{ route('category',$category->slug) }}"> {{ $category->name }} </a>
                        </small>
                    @endforeach
<br><br>
                    {!! htmlspecialchars_decode($post->body) !!}
<br><br>
                    {{--Tag Clouds--}}
                    <h3>Tag Clouds</h3>
                    @foreach($post->tags as $tag)
                       <a href="{{ route('tag',$tag->slug) }}"> <small class="flot-left" style="margin-right: 20px;border-radius:5px;border: 1px solid gray;padding: 5px;">
                            {{ $tag->name }}
                        </small></a><br><br>
                    @endforeach
                </div>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>
            </div>
        </div>
    </article>

    <hr>

@endsection
