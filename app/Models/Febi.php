<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Febi extends Model
{
    use HasFactory;

    public function pond()
    {
        return $this->belongsTo(Pond::class);
    }
}
