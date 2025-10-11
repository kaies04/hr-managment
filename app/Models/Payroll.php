<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'basic_salary',
        'allowances',
        'deductions',
        'bonuses',
        'net_salary',
        'generated_at',
    ];

    protected $casts = [
        'generated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
