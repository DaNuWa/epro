<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $dates = ['started_at', 'accepted_at', 'rejected_at'];

    public function expired()
    {
        if ($this->started_at == null) {
            return false;
        }
        return $this->started_at->addHours($this->hours)->lt(now()) && $this->status == 'in-progress';
    }

    public function needToDeliverAt()
    {
        if ($this->started_at == null) {
            return;
        }
        return $this->started_at->addHours($this->hours);
    }

    public function consumer()
    {
        return $this->belongsTo(User::class, 'consumer_id');
    }
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}
