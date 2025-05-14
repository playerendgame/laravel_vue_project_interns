<?php

namespace App\Http\Controllers\Ajax\Admin\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        $adminId = Auth::guard('user')->user()->id;

        $post = Post::where('admin_id', $adminId);
        return response($post);
    }

    public function fetchPostPerId($id) {
        $post = Post::find($id);
        return response()->json($post);
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

       $post = Post::find($id);

       $post->title = $request->input('title');
       $post->description = $request->input('description');
       $post->date = $request->input('date');
       $post->save();

        return response()->json(['message' => 'Success updating data']);
    }

    public function delete($id){

        $people = Post::find($id);
        $people->delete();

        $result = ($people) ? 'Deleted Successfully' : 'Error Deleting';

        return response()->json(['message' => $result]);

     }
}
