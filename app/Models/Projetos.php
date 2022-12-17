<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    //protected $casts = [
    //    'dias' => 'array'
    //];

    protected $fillable = [
        'image',
        'path',
        'title',
        'days',
        'phone',
        'postcode',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement',
        'description',
        'user_id',
    ];

    public function user() { // 1 usuário é dono do evento
        return $this->belongsTo('App\Models\User'); 
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
   }
   
}
