<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'region',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ponds()
    {
        return $this->hasMany(Pond::class);
    }

    public function expenseCategories()
    {
        return $this->hasMany(ExpenseCategory::class);
    }

    public function incomeCategories()
    {
        return $this->hasMany(IncomeCategory::class);
    }

    public function feedTypes()
    {
        return $this->hasMany(FeedType::class);
    }

    public function fishTypes()
    {
        return $this->hasMany(FishType::class);
    }

    public function fishAdditions()
    {
        return $this->hasMany(FishAddition::class);
    }
}
