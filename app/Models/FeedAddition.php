<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedAddition extends Model
{
    use HasFactory;

    protected $fillable = [
        'feed_type_id',
        'pond_id',
        'quantity',
        'cost',
        'date_purchased'
    ];

    public function feedType()
    {
        return $this->belongsTo(FeedType::class);
    }

    public function pond()
    {
        return $this->belongsTo(Pond::class);
    }
}
