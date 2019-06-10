<?php

use Illuminate\Database\Seeder;
use App\Busse;
class BusseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $busse = new Busse();
        $busse->conductor = 'Javier Lopez';
        $busse->number_passagers = 20;
        $busse->type = 'Concorde';
        
        $busse->save();

        $busse2 = new Busse();
        $busse2->conductor = 'Daniel Vargas';
        $busse2->number_passagers = 12;
        $busse2->type = 'Autoboy';
        $busse2->save();
        
        
    }
}
