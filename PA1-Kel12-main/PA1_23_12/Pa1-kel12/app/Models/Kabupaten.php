<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function destination()
    {
        return $this->hasMany(Destination::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }
}
