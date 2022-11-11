<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'rate',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('projectimages')
            // ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_profiles');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
