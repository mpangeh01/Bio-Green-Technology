<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedReduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'feed_type_id',
        'pond_id',
        'quantity',
        'reduction_date',
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
