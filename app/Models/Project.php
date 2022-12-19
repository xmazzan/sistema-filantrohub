<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'coop_type'
    ];

    public function user() { // 1 usuário é dono do evento
        return $this->hasMany(User::class); 
    }

    public function project_user_role(){
        return $this->belongsToMany(ProjectUserRole::class);
    }
}
