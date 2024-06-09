<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'farm_id'];

    /**
     * Get the farm that owns the fish type.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
