<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function destination()
    {
        return $this->hasMany(Destination::class);
    }
}
