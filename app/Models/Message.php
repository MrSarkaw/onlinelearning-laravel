<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
