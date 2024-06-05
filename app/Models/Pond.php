<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pond extends Model
{
    use HasFactory;

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function febi()
    {
        return $this->hasOne(Febi::class);
    }

}
