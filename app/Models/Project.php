<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

     protected $fillable = array('title', 'description','year_project', 'programming_language','image','type_id');

      public function type(){
        return $this->belongsTo(Type::class);
      }

      public function tecnologies(){
         return $this->belongsToMany(Tecnology::class);


      }
}
