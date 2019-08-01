<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(relation::class);
        $this->call(qualification::class);
        $this->call(specialization::class);
        $this->call(university::class);
        $this->call(coin::class);

    }
}
