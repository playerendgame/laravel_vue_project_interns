<?php

namespace App\Http\Controllers\Ajax\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class InformationController extends Controller
{
    public function getUserByEmail(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return response()->json($user);
        }

        return response()->json(['message' => 'User not found'], 404);
    }
        public function save(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'contact' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = User::find(Auth::guard('user')->id());
        $user->name = $request->input('name');

        $info = $user->info;
        if (!$info) {
            $info = new Info();
            $info->user_id = $user->id;
        }

        $info->age = $request->input('age');
        $info->contact = $request->input('contact');
        $info->address = $request->input('address');
        $info->birthday = $request->input('birthday');

        if ($request->hasFile('image')) {
            if ($info->image_path && Storage::exists('public/' . $info->image_path)) {
                Storage::delete('public/' . $info->image_path);
            }

            $originalName = $request->file('image')->getClientOriginalName();
            $cleanName = preg_replace('/\s+/', '_', pathinfo($originalName, PATHINFO_FILENAME));
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $cleanName . '_' . time() . '.' . $extension;

            $request->file('image')->storeAs('public/profile/' . $info->id, $imageName);
            $info->image_path = 'profile/' . $info->id . '/' . $imageName;
            $info->image_name = $imageName;
        }

        $savedUser = $user->save();
        $savedInfo = $info->save();

        if ($savedUser && $savedInfo) {
            return response()->json(['message' => 'Profile updated successfully']);
        } else {
            return response()->json(['message' => 'Error updating profile'], 500);
        }
    }

        public function getUserInfo(){
        $user = Auth::guard('user')->user();
        $info = $user->info;

        $data = [
            'name' => $user->name,
            'created_at' => $user->created_at->format('F d, Y'),
            'age' => $info ? $info->age : '',
            'address' => $info ? $info->address : '',
            'birthday' => $info ? $info->birthday : '',
            'birthday_formatted' => $info ? Carbon::parse($info->birthday)->format('F j, Y') : '',
            'contact' => $info ? $info->contact: '',
            'image' => ($info && $info->image_path) ? asset('storage/' . $info->image_path) : asset('images/default-profile.png'),
        ];

        return response()->json($data);
    }
}   


