<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    use HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'f_name',
        'l_name',
        'user_name',
        'age',
        'email',
        'phone',
        'ip_address',
        'street_address',
        'division_id',
        'district_id',
        'blood_group',
        'password',
        'sadmin_image',
    ];
}
