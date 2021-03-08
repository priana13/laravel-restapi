<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return response()->json($data,200);

    }

    public function show($id)
    {
        $data = Post::find($id);

        if(is_null($data)){
            return response()->json([
                'messege' => 'Resource Not Found'], 404);
        }

        return response()->json($data,200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
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
