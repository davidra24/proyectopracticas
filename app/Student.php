<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'name'];
    public function managePractice(){
    return $this->hasOne(ManagePractice::class,'id_student','id');
    }
}
