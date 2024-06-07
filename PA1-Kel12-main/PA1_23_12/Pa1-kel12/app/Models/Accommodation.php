<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function contributor()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function galleries()
    {
        return $this->hasMany(AccommodationGallery::class);
    }
}
