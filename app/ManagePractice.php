<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePractice extends Model
{
    protected $fillable = ['id_practice', 'id_student'];
    public function student(){
        return $this->hasMany(Student::class,'id','id_student');
    }
    
    public function practice(){
        return $this->hasMany(Practice::class,'id','id_practice');
    }
    
}
