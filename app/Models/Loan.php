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
        'number_of_installment',
        'finish_date',
        'actual_finish_date',
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
