<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishAddition extends Model
{
    use HasFactory;
    protected $fillable = [
        'pond_id',
        'fish_type_id',
        'date_added',
        'quantity',
        'cost_per_fish',
        'total',
        'weight',
        'farm_id'
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
