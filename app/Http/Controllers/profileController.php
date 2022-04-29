<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index($id){

        $profile = User::where('id', $id)->with(['rooms', 'messages' => function($q){
            $q->with('room', 'user');
        }])->firstOrFail();
        $topics = Topic::withCount('rooms')->get();
        $rooms = Room::count();

        return view('profile.index', compact('profile', 'topics', 'rooms'));
    }

    public function edit(){
        return view('profile.editProfile', ['user'=>Auth::user()]);
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|email|unique:users,email,".Auth::id()."",
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            "avatar" => "nullable|mimes:png,jpeg,jpg"
        ]);

        $user = Auth::user();

        $img = $user->image;

        if($request->avatar){
            $img = $request->file('avatar')->hashName();
            $request->file('avatar')->move(public_path('images'), $img);
        }
        $request->merge(['image'=>$img]);


        if($request->password)
            User::find(Auth::id())->update($request->only('name', 'email', 'image', 'bio', 'password'));
        else
            User::find(Auth::id())->update($request->only('name', 'email', 'image', 'bio'));

        return redirect()->back()->with(['message' => "updated successfully"]);

    }
}
