<?php

use Illuminate\Database\Seeder;
use App\Teacher;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->truncate();
        $teacher = new Teacher();
        $teacher->id = 4119762;
        $teacher->name = 'Diego Ruiz';      
        
        $teacher->save();

        $teacher = new Teacher();
        $teacher->id = 52416305;
        $teacher->name = 'Andrea Gonzalez Duarte';      
        
        $teacher->save();
    }
}
