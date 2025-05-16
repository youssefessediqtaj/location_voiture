<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'registration_number',
        'brand',
        'model',
        'type',
        'mileage',
        'purchase_date',
        'status',
        'daily_price',
        'description',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'daily_price' => 'decimal:2',
    ];

    public function documents()
    {
        return $this->hasMany(CarDocument::class);
    }

    public function histories()
    {
        return $this->hasMany(CarHistory::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
