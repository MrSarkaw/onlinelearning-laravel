<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'topic_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

      
    public function messages()
    {
        return $this->hasMany(Message::class, 'room_id');
    }

        
    public function particpanties()
    {
        return $this->hasMany(Particpant::class, 'room_id');
    }
}
