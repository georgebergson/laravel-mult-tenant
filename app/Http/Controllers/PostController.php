<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }
    public function store(Post $post,PostStoreRequest $request){
        $inputs = $request->validated();
     
        $post->fill($inputs);
        $post->save();
        return new PostResource($post);
    }

    public function update(Post $post, PostUpdateRequest $request, $id){

        $inputs = $request->validated();
        $post = $post->find($id);
        $post->fill($inputs);
        $post->save();
        return new PostResource($post);
    }
}
