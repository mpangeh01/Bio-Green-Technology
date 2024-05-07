<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function carModel(){

        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function listing(){

        return $this->hasOne(Listing::class);
    }
    public function legalDocuments(){

        return $this->hasOne(CarLegalDocuments::class);
    }
    public function images(){

        return $this->hasOne(CarImages::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
