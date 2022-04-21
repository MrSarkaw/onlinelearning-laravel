<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index($id){

        $profile = User::where('id', $id)->with(['rooms', 'messages' => function($q){
            $q->with('room');
        }])->firstOrFail();
        $topics = Topic::withCount('rooms')->get();
        $rooms = Room::count();

        return view('profile.index', compact('profile', 'topics', 'rooms'));
    }
}
