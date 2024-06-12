<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishReduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'pond_id',
        'fish_type_id',
        'date_reduced',
        'quantity',
        'cost_per_fish',
        'total',
        'weight',
    ];

    public function pond()
    {
        return $this->belongsTo(Pond::class);
    }

    public function fishType()
    {
        return $this->belongsTo(FishType::class);
    }
}
