<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'address',
        'complement',
        'district',
        'zipcode',
        'dt_register',
    ];
}
