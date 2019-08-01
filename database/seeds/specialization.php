<?php

use Illuminate\Database\Seeder;

class specialization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            ['name' => 'IT'],
            ['name' =>'Doctor'],
            ['name' =>'education'],
            ['name' =>'Sciences'],
            ['name' =>'engineering'],
        ]);
    }
}
