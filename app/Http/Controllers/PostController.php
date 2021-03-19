<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use DB;

class PostController extends Controller
{
    public function index()
    {
        // DB listen
        // DB::listen(function($query){
        //     var_dump($query->sql);
        // });

        $data = Post::with(['user'])->paginate(10);
        return new PostCollection($data);
        // return response()->json($data,200);

    }

    public function show($id)
    {
        $data = Post::find($id);

        if(is_null($data)){
            return response()->json([
                'messege' => 'Resource Not Found'], 404);
        }

        return new PostResource($data);
        // return response()->json($data,200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,
        [
            "title" => ["required","min:5"]
        ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()],400);
            }

        $response = Post::create($data);

        return response()->json($response,201);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json($post,200); 
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null,200);
    }


}
