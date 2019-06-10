<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['id', 'name'];
    public function practice()
    {
        return $this->hasOne(Practice::class, 'id_teacher', 'id');
    }
}
