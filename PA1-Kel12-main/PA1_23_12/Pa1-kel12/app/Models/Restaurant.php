<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function galleries()
    {
        return $this->hasMany(RestaurantGallery::class);
    }

    public function contributor()
    {
        return $this->belongsTo(Contributor::class, 'contributor_id');
    }
}
