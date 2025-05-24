<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'car_id',
        'document_type',
        'file_path',
        'expiry_date',
        'description',
    ];

    protected $casts = [
        'expiry_date' => 'date',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
