<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
     protected $fillable = [
        'name', 'contact_number', 'email', 'subscription_plan', 'status'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
