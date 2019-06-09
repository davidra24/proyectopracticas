<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePractice extends Model
{
    protected $fillable = ['id_practice', 'id_teacher', 'id_student','id_bus'];
    public function student(){
        return $this->hasMany(Student::class,'id_student','id');
    }
    public function teacher(){
        return $this->hasMany(Teacher::class,'id_teacher','id');
    }
    public function practice(){
        return $this->hasMany(Practice::class,'id_practice','id');
    }
    public function busse(){
        return $this->hasMany(Busse::class,'id_bus','id');
    }
   
}
