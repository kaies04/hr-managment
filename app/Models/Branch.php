<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'branch_name',
        'contact_number',
        'email',
        'status',
        'location'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
