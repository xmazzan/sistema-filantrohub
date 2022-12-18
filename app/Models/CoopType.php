<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoopType extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function project(){
        return $this->belongsToMany(Project::class);
    }
}
