<?php

use Illuminate\Database\Seeder;
use App\Practice;
class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $practice = new Practice();
        $practice->date_practice = '2015-12-06';
        $practice->place= 'Medellin-Antioquia';
        $practice->id_teacher = 4119762;
        $practice->id_bus = 1;
        
        $practice->save();

        $practice = new Practice();
        $practice->date_practice = '2018-07-06';
        $practice->place= 'Cordoba';
        $practice->id_teacher = 52416305;
        $practice->id_bus = 2;
        
        $practice->save();
    }
}
