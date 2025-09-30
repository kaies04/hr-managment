<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_name',
        'org_contact_number',
        'org_email',
        'subscription_plan',
        'status'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
