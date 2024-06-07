<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // 1 destinasi memiliki banyak foto dari model gallery
    public function galleries()
    {
        return $this->hasMany(DestinationGallery::class);
    }

    public function destinationCategory()
    {
        return $this->belongsTo(DestinationCategory::class);
    }

    public function accommodation()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function contributor()
    {
        return $this->belongsTo(Contributor::class);
    }
}
