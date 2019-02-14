@extends('layouts.master')
@section('content')

    <div class="row mt-5">
        @foreach($posts as $post)

            <div class="card card-plain card-blog">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card-header card-header-image">
                            <a href="#pablito">
                                <img class="img" src="{{$post->image}}">
                            </a>
                            <div class="colored-shadow"
                                 style="background-image: url(&quot;./assets/img/examples/card-blog4.jpg&quot;); opacity: 1;"></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h6 class="card-category text-info">Enterprise</h6>
                        <h3 class="card-title">
                            <a href="#pablo">{{$post->title}}</a>
                        </h3>
                        <p class="card-description">
                            {{$post->content}}
                            <a href="/posts/{{$post->id}}"> Read More </a>
                        </p>
                        <p class="author">
                            by
                            <a href="/writers/{{$post->writer->id}}/posts">
                                <b>{{$post->writer->name}}</b>
                            </a>, {{$post->created_at->toFormattedDateString()}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-auto">
    {{$posts->links()}}
        </div>
    </div>
@endsection