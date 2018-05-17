@extends("layout")
@section("links")
@foreach($links as $link)
<li><a href="/posts/{{$link->id}}">{{$link->name}}</a></li>

@endforeach
@endsection


@section("body")
    @foreach($posts as $post)
        <h1>{{$post->title}}</h1>
        <p>{{str_limit($post->body,100)}}</p>
        <a href="/post/{{$post->id}}">дальше</a>
    @endforeach
@endsection