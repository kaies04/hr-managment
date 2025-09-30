<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'department_id', 'designation_id', 'shift_id',
        'name', 'email', 'phone', 'father_name', 'mother_name',
        'date_of_birth', 'education', 'skill', 'join_date', 'status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function salary()
    {
        return $this->hasOne(EmployeeSalary::class);
    }
}
