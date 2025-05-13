<?php

namespace App\Http\Controllers\Ajax\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->date = $request->input('date');
        $post->save();

        $result = ($post) ? 'Data has been created successfully' : 'There has an error creating a post';    
        return response()->json(['message' => $result]);
    }

    public function list(){
        $post = Post::all();
        return response($post);
    }

    public function fetchPostPerId($id) {
        $post = Post::find($id);
        return response()->json($post);
    }
}
