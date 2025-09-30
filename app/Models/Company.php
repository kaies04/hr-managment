<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization_id',
        'company_name',
        'company_contact_number',
        'company_email',
        'company_address',
        'company_status'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
