<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = ['id','date_practice', 'place', 'id_teacher','id_bus'];
    public function managePractice(){
        return $this->hasOne(ManagePractice::class,'id_practice','id');
    }
    public function teacher(){
        return $this->hasMany(Teacher::class,'id','id_teacher');
    }
    public function bus(){
        return $this->hasMany(Busse::class,'id','id_bus');
    }
}
