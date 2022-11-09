<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    /*
          ONE TO MANY - relation between database tables!
    public function user() { // 1 usuário é dono do evento
        return $this->belongsTo('App\Models\User'); 
    }

        MANY TO MANY - relation between database tables!
    public function users() {
        return $this->belongsToMany('App\Models\User');
   }
    */
}
