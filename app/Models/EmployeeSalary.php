<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

     protected $fillable = [
        'employee_id', 'basic_salary', 'allowances',
        'pf_enabled', 'pf_percentage', 'loan_active'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
