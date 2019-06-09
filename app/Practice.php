<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = ['id', 'place'];
    public function managePractice(){
        return $this->hasOne(ManagePractice::class,'id_practice','id');
    }
}
