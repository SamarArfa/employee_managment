<?php

use Illuminate\Database\Seeder;

class qualification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->insert([
            ['name' => 'BA'],
            ['name' =>'M.A.'],
            ['name' =>'Ph.D.'],
            ['name' =>'diploma'],
            ['name' =>'Prof']
        ]);
    }
}
