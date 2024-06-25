<?php

// app/Models/Payment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_amount',
        'term',
        'loan_date',
        'interest_rate',
        'monthly_payment',
        'company_id',
        'paid',
    ];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
