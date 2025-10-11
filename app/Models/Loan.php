<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
     protected $fillable = [
        'employee_id',
        'loan_amount',
        'monthly_installment',
        'remaining_balance',
        'start_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
