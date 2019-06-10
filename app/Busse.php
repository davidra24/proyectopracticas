<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busse extends Model
{
    protected $fillable = ['conductor', 'number_passagers', 'type'];
    public function practice()
    {
        return $this->hasOne(Practice::class, 'id_bus', 'id');
    }
}
