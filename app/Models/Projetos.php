<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    protected $casts = [
        'dias' => 'array'
    ];

    protected $fillable = [
        'image',
        'title',
        'days',
        'postcode',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement',
        'description',
    ];


}
