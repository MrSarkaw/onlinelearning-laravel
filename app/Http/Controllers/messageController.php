<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class messageController extends Controller
{
    public function store(Request $request){


        $this->validate($request,[
            'message' => 'required',
            'room_id' => 'required'
        ]);

        Room::findOrFail($request->room_id);

        Auth::user()->messages()->create($request->only('message', 'room_id'));

        return redirect()->back();
    }


    public function destroy($id){
        Auth::user()->messages()->findOrFail($id)->delete();

        return redirect()->back();
    }
}
