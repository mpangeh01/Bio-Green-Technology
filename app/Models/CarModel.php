<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    public function carType(){

        return $this->belongsTo(CarType::class, 'type_id');
    }

    public function carMake(){

        return $this->belongsTo(CarMake::class, 'make_id');
    }

    public function cars(){

        return $this->hasMany(Car::class);
    }
}
