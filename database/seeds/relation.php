<?php

use Illuminate\Database\Seeder;

class relation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relations')->insert([
            ['name' => 'father'],
            ['name' =>'mother'],
            ['name' =>'Grandpa'],
            ['name' =>'Grandma'],
            ['name' =>'brother'],
            ['name' =>'Sister'],
            ['name' =>'Aunt'],
            ['name' =>'uncle']
        ]);

    }
}
