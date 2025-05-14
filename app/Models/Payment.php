<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'amount',
        'payment_method',
        'payment_date',
        'remarks',
    ];

    // Optional: Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
