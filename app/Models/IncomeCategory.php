<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'farm_id'];

    /**
     * Get the farm that owns the income category.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
