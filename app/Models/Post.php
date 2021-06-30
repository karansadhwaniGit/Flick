<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=['published_at'];
    public function getImagePathAttribute()
    {
        return 'storage/'.$this->image;
    }
    public function category()
    {
        return $this->belongsTo(categories::class,'category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimeStamps();
    }
}
