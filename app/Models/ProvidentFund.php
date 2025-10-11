<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFund extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'contribution_amount',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
