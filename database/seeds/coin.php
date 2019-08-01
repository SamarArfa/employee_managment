<?php

use Illuminate\Database\Seeder;

class coin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([




            ['name' => 'Dinar'],
            ['name' =>'euro'],
            ['name' =>'Lira'],
            ['name' =>'SR']
        ]);
    }
}
