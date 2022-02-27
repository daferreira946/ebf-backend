<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sex',
        'marital_status',
        'birth_place',
        'general_record',
        'issuing_agency',
        'issuing_agency_fu',
        'cpf',
        'zipcode',
        'public_place',
        'number',
        'city',
        'fu',
        'cellphone',
        'phone',
        'email',
        'have_transportation'
    ];

    protected $casts = [
        'have_transportation' => 'boolean'
    ];
}
