<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    public function managePractice(){
        return $this->hasMany(ManagePractice::class,'id_practice','id');
    }
}
