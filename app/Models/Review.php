<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $fillable = [
        'profile_id',
        'consumer_id',
        'star_rate',
        'review'
    ];
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;


    public function reviewer()
    {
        return $this->belongsTo(User::class, 'consumer_id', 'id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function provider()
    {
        return $this->belongsToThrough(User::class, Profile::class);
    }
}
