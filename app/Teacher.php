<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function managePractice(){
        return $this->hasMany(ManagePractice::class,'id_teacher','id');
    }
}
