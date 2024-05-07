<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    public function fare(){

        return $this->belongsTo(Fare::class, 'fare_id');
    }

    public function bookings(){

        return $this->hasMany(Booking::class);
    }

    public function car(){

        return $this->belongsTo(Car::class, 'car_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions(){

        return $this->hasMany(Transaction::class);
    }
}
