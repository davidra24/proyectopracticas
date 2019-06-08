<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busse extends Model
{
    
    public function managePractice(){
        return $this->hasMany(ManagePractice::class,'id_bus','id');
    }
}
