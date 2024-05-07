<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fareFactor extends Model
{
    use HasFactory;

    protected $fillable = ['updated_by'];

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
