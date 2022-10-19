<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function scopeRecievedMessages($query)
    {
        return $query->where('receiver_id', auth()->id());
    }

    public function scopeSentMessages($query)
    {
        return $query->where('sender_id', auth()->id());
    }

    public function sender($query)
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receiver($query)
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
}
