<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    use HasFactory;

    protected $fillable =['tecnology'];

    public function projects(){
        return $this->belongsToMany(Project::class);

    }
}
