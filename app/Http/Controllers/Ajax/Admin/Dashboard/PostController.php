<?php

namespace App\Http\Controllers\Ajax\Admin\Dashboard;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->date = $request->input('date');
        $post->admin_id = auth()->id();
        $post->save();

        //Ito ang logic codes for image handling
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/posts/'.$post->title, $imageName, 'public');

        $postImage = new PostImage();
        $postImage->post_id = $post->id;
        $postImage->image_path = 'public/posts/'.$post->title.'/'.$imageName;
        $postImage->image_name = $imageName;
        $postImage->save();

 
        $result = ($post) ? 'Data has been created successfully' : 'There has an error creating a post';    
        return response()->json(['message' => $result]);
    }

    public function list(){

        $adminId = Auth::guard('user')->user()->id;


        $post = Post::where('admin_id', $adminId)->get();

        //Gumamit ako ng for loop to detect ung actual image for the specific posts
        $data = [];
        foreach($post as $item){
            $postImage = PostImage::Where('post_id', $item->id)->first();
            if($postImage){
                $data[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'date' => $item->date,
                    'image' => asset('storage/public/posts/' . $item->title. '/' . $postImage->image_name),
                ];
            }
 
        }
        return response()->json($data);//wondering bakit $data ginamit ko? dahil mapapansin nio nasa loob ng for loop parameters ang $post
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
            'image' => 'required'
        ]);

       $post = Post::find($id);

       $post->title = $request->input('title');
       $post->description = $request->input('description');
       $post->date = $request->input('date');
       $post->save();

       $postImage = PostImage::where('post_id', $post->id)->first();

       if($postImage){
            Storage::disk('public')->delete($postImage->image_path);
            $postImage->delete();
        }

        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/posts/'.$post->title, $imageName, 'public');

        $newPostImage = new PostImage();
        $newPostImage->post_id = $post->id;
        $newPostImage->image_path = 'public/posts/'.$post->title.'/'.$imageName;
        $newPostImage->image_name = $imageName;
        $newPostImage->save();

        return response()->json(['message' => 'Success updating data']);
    }

    public function delete($id){

        $people = Post::find($id);
        $people->delete();

        $result = ($people) ? 'Deleted Successfully' : 'Error Deleting';

        return response()->json(['message' => $result]);

     }
}
