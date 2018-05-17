@extends("layout")
@section("body")
    <p>{{$post->id}}</p>
 <h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>
<img src="{{asset($post->path)}}">
<form action="/addComment/{{$post->id}}" method="post">
   @csrf
    <input type="text" name="user">
    <input type="text" name="body">
    <button class="btn">коментировать</button>
</form>        

@endsection