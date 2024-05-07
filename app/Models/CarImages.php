<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImages extends Model
{
    use HasFactory;


    public function car(){

        return $this->belongsTo(Car::class, 'car_id');
    }
}
