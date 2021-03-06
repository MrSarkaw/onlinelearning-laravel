<?php

namespace App\Http\Controllers;

use App\Http\Requests\roomRequest;
use App\Models\Message;
use App\Models\Room;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roomController extends Controller
{
   
    public function index(Request $request)
    {
        $rooms = [];
        if($request->q){
            $rooms = Room::with('user', 'topic')->withCount('particpanties')->whereHas('topic', function($topic) use($request){
                $topic->where('name', $request->q);
            })->orWhere("title","like","%".$request->q."%")->latest()->get();
        }else{
            $rooms = Room::with('user', 'topic')->withCount('particpanties')->latest()->get();
        }

        $room_count = Room::count();

        $topics = Topic::withCount('rooms')->get();

        $messages = Message::with('user')->get();

        return view('pages.room.index', compact("rooms", "topics", "room_count", 'messages'));
    }

    
    public function create()
    {
        $topics = Topic::all();
        return view('pages.room.form', compact('topics'));
    }

    
    public function store(roomRequest $request)
    {
      $topic = Topic::firstOrCreate(['name' => $request->topic]);
      
      $request->merge(['topic_id' => $topic->id]);

      Auth::user()->rooms()->create($request->only('title', 'topic_id', 'description'));

      return redirect('/');
    }


    public function show($id)
    {
        $room = Room::where('id', $id)->with(['user', 'topic', 'particpanties' => function($message){
            $message->with('user');
        }, 'messages' => function($message){
            $message->with('user');
        }])->firstOrFail();

        return view('pages.room.show', compact('room'));
    }

   
    public function edit($id)
    {
        $topics = Topic::all();
        $data = Auth::user()->rooms()->findOrFail($id);
        return view('pages.room.form', ['room'=>$data, 'topics'=> $topics]);
    }

 
    public function update(Request $request, $id)
    {
        $topic = Topic::firstOrCreate(['name' => $request->topic]);
      
        $request->merge(['topic_id' => $topic->id]);
  
        Auth::user()->rooms()->findOrFail($id)->update($request->only('title', 'topic_id', 'description'));
  
        return redirect('/');
    }

   
    public function destroy($id)
    {
        Auth::user()->rooms()->findOrFail($id)->delete();
        return redirect('/');
    }

}
