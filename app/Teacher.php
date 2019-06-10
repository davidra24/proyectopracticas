<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name'];
    public function managePractice()
    {
        return $this->hasOne(ManagePractice::class, 'id_teacher', 'id');
    }
}
