<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Profile extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



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
        return $this->belongsToMany(Category::class,'category_profiles');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
