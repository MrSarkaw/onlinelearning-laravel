<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    
    public function rooms()
    {
        return $this->hasMany(Room::class, 'topic_id');
    }
}
