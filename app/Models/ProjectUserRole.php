<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'user_role'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function project(){
        return $this->hasMany(Project::class);
    }
}
