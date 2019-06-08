<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function managePractice(){
    return $this->hasMany(ManagePractice::class,'id_student','id');
    }
}
