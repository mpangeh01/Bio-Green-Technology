<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    use HasFactory;

    public function listings()
    {

        return $this->hasMany(Listing::class);
    }

    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to');
    }
}
