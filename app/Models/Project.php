<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //protected $casts = [
    //    'days' => 'array'
    //];

    protected $fillable = [
        //'image',
        'image_path',
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

    
          //ONE TO MANY - relation between database tables!
    public function user() { // 1 usuário é dono do evento
        return $this->belongsTo('App\Models\User');
    }

    /*    MANY TO MANY - relation between database tables!*/
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
