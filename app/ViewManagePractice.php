<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewManagePractice extends Model
{
    protected $fillable = ['id_practice','id_student','id_bus','id_teacher','place', 'date_practice','nameteacher','conductor','type','namestudent'];
}
