<?php

use Illuminate\Database\Seeder;

class university extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            ['name' => 'Islamic'],
            ['name' =>'Al_Azhar'],
            ['name' =>'Al_Aqsa'],
            ['name' =>'Gaza']
        ]);
    }
}
