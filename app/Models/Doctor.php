<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'user_name',
        'age',
        'email',
        'phone',
        'ip_address',
        'status',
        'street_address',
        'division_id',
        'district_id',
        'blood_group',
        'password',
        'doc_image',
        'specialist',
        'experience',
        'Degree',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
