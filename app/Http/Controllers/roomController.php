<?php

namespace App\Http\Controllers;

use App\Http\Requests\roomRequest;
use App\Models\Room;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roomController extends Controller
{
   
    public function index()
    {
        $room = Room::with('user', 'topic')->get();
        return view('pages.room.index');
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
        //
    }

   
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
