<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=20;$i++){
           $course = DB::table('courses')->insert([
            'title'=>'Course Name'.$i,
            'slug'=>'Course-Name'.$i,
            'description'=>'lorem',
            'image'=>'https://via.placeholder.com/200x200',
            'price'=>0,
            'category'=>'programming',
            'author'=>'amna'


        ]);

        };
    }
}
