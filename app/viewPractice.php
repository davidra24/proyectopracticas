<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viewPractice extends Model
{
    protected $fillable = ['id','place', 'date_practice','name','conductor','type'];
    
}
