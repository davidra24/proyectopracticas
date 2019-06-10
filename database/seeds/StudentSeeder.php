<?php

use Illuminate\Database\Seeder;
use App\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->truncate();
        $student = new Student();
        $student->id = 201412256;
        $student->name = 'Sebastian Ruiz';      
        
        $student->save();

        $student = new Student();
        $student->id = 201512256;
        $student->name = 'Santiago Matinez';      
        
        $student->save();
    }
}
