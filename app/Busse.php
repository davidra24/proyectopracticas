<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busse extends Model
{
    protected $fillable = ['conductor', 'number_passagers', 'type'];
    public function managePractice()
    {
        return $this->hasOne(ManagePractice::class, 'id_bus', 'id');
    }
}
