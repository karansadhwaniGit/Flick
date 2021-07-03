<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    public function hasTag(int $id):bool
    {
        return in_array($id, $this->tags->pluck('id')->toArray());
    }
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
