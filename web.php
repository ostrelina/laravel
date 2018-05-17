<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Route::get('/', function () {
    $categ=App\Category::all();
    return view('welcome',["results"=>$categ]);
});
Route::get('/test/{name}',function($name){
    
    App\Category::create([
        "name"=>$name
    ]);
});
Route::get('/posts/{id}',function($id){
    $result=App\Category::all();
    $posts=App\Post::where("category_id",$id)->get();
    $body=App\Post::where("body",$id)->get();
    return view("posts",["links"=>$result, "posts"=>$posts]);
    
});
Route::get('/post/{id}',function($id){
   $post=App\Post::find($id);
    $coments= $post->comments;
    return view('post',['post'=>$post]);
});
Route::post('/addComment/{id}',function(Request $req,$id){
    
    App\Comment::create([
        "user_name"=>$req->user,
        "comment"=>$req->body,
        "post_id"=>$id
    ]);
   return back();
});
Route::get('/admin', function(){
    return view('admin');
});
Route::post('/addPost',function(Request $req){
    $path=Storage::put('public',$req->file('post_image'));
    $url=Storage::url($path);
    echo "path";
    App\Post::create([
        "title"=>$req->post_title,
        "body"=>$req->post_body,
        "category_id"=>1,
        "path"=>$url
    ]);
});
Route::get('/ajax',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    $post=App\Post::find($req->test);
    return $post;
    
});
Route::get('/getAll',function(Request $req){
     header('Access-Control-Allow-Origin:*');
    $item=App\Item::all();
    return $item;
});
Route::get('/found',function(Request $req){
   header('Access-Control-Allow-Origin:*');
    $items=App\Items::find($req->status);
    return $items;
});