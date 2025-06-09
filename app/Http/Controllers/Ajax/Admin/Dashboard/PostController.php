<?php

namespace App\Http\Controllers\Ajax\Admin\Dashboard;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class PostController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'category_id' => 'required',
            'image' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->date = $request->input('date');
        $post->category_id = $request->input('category_id');
        $post->admin_id = auth()->id();
        $post->save();

        //Ito ang logic codes for image handling
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/posts/'.$post->id, $imageName, 'public');

        $postImage = new PostImage();
        $postImage->post_id = $post->id;
        $postImage->image_path = 'public/posts/'.$post->id.'/'.$imageName;
        $postImage->image_name = $imageName;
        $postImage->save();


        $result = ($post) ? 'Data has been created successfully' : 'There has an error creating a post';
        return response()->json(['message' => $result]);
    }

    public function list(){

        $adminId = Auth::guard('user')->user()->id;


        $post = Post::with('category')
        ->where('admin_id', $adminId)
        ->get();

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
                    'category_id' => $item->category_id,
                    'category_name' => $item->category->category_name,
                    'image' => asset('storage/public/posts/' . $item->id. '/' . $postImage->image_name),
                    'admin_name' => $item->user->name,
                ];
            }

        }
        return response()->json($data);//wondering bakit $data ginamit ko? dahil mapapansin nio nasa loob ng for loop parameters ang $post
    }

    public function fetchPostPerId($id) {
        $post = Post::with('postImage')->find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'category_id' => 'required',
        ]);

       $post = Post::find($id);
       $post->title = $request->input('title');
       $post->description = $request->input('description');
       $post->date = $request->input('date');
       $post->category_id = $request->input('category_id');
       $post->save();

        return response()->json(['message' => 'Success updating data']);
    }

    public function updatePostImage(Request $request, $id){

       $post = Post::find($id);

        $postImage = PostImage::where('post_id', $post->id)->first();

       if($postImage){
            Storage::disk('public')->delete($postImage->image_path);
            $postImage->delete();
        }

        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/posts/'.$post->id, $imageName, 'public');

        $newPostImage = new PostImage();
        $newPostImage->post_id = $post->id;
        $newPostImage->image_path = 'public/posts/'.$post->id.'/'.$imageName;
        $newPostImage->image_name = $imageName;
        $newPostImage->save();
    }

    public function delete($id){

        $people = Post::find($id);
        $people->delete();

        $result = ($people) ? 'Deleted Successfully' : 'Error Deleting';

        return response()->json(['message' => $result]);

     }

    public function getPostsByCategory(Request $request, $categoryId){
        $user = auth()->user();
        $post = Post::where('category_id', $categoryId)
                    ->where('admin_id', $user->id)
                    ->get();

        $data = [];
        foreach($post as $item){
            $postImage = PostImage::Where('post_id', $item->id)->first();
            if($postImage){
                $data[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'date' => $item->date,
                    'category_id' => $item->category_id,
                    'category_name' => $item->category->category_name,
                    'image' => asset('storage/public/posts/' . $item->id. '/' . $postImage->image_name),
                    'admin_name' => $item->user->name,
                ];
            }
        }
        return response()->json($data);
    }

    public function AllPosts(Request $request){
        $post = Post::with('category')
        ->get();

     
        $data = [];
        foreach($post as $item){
            $postImage = PostImage::Where('post_id', $item->id)->first();
            if($postImage){
                $data[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'date' => $item->date,
                    'category_id' => $item->category_id,
                    'category_name' => $item->category->category_name,
                    'image' => asset('storage/public/posts/' . $item->id. '/' . $postImage->image_name),
                    'admin_name' => $item->user->name,
                ];
            }

        }
        return response()->json($data);
      }
    

    public function Readmore($id){
        
        $item = Post::with([
            'category:id,category_name',
            'user:id,name',
            'user.info:id,user_id,image_path',
            'postImage:id,post_id,image_name'
        ])->findOrFail($id);

        $data = [
            'id' => $item->id,
            'title' => $item->title,
            'description' => $item->description,
            'date' => $item->date,
            'date_formatted' => Carbon::parse($item->date)->format('F j, Y'),
            'category' => ($item->category)->category_name,
            'image' => $item->postImage ? asset('storage/public/posts/' . $item->id . '/' . $item->postImage->image_name) : null,
            'user_name' => ($item->user)->name,
            'user_image' => $item->user->info->image_path ? asset('storage/' . $item->user->info->image_path) : null,
        ];

        return response()->json($data);
    }

    
}

