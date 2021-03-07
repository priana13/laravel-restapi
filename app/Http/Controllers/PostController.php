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
        return response()->json($data,200);
    }


}
