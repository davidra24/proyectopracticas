<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePractice extends Model
{
    public function student(){
        return $this->hasOne(Student::class,'id_student','id');
    }
    public function teacher(){
        return $this->hasOne(Teacher::class,'id_teacher','id');
    }
    public function practice(){
        return $this->hasOne(Practice::class,'id_practice','id');
    }
    public function busse(){
        return $this->hasOne(Busse::class,'id_bus','id');
    }
   
}
