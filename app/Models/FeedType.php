<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'farm_id',
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
