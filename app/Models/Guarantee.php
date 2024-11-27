<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantee extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [
        'corporate_reference_number',
        'guarantee_type',
        'nominal_amount',
        'nominal_amount_currency',
        'expiry_date',
        'applicant_name',
        'applicant_address',
        'beneficiary_name',
        'beneficiary_address',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'expiry_date' => 'datetime',
    ];
}
