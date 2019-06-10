<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viewPractice extends Model
{
    protected $fillable = ['id','id_teacher','id_bus','place', 'date_practice','name','conductor','type'];
    
}
