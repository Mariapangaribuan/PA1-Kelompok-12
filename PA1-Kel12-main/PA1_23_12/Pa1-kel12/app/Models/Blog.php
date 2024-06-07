<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function contributor()
    {
        return $this->belongsTo(Contributor::class);
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function galleries()
    {
        return $this->hasMany(BlogGallery::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    // public function incrementReadCount()
    // {
    //     // $this->timestamps = false;
    //     $this->reads++;
    //     return $this->save();
    // }
}
