<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Eloquent::unguard();
        // $this->setFKCheckOff();
        $this->call([
            TaskSeeder::class
        ]);
        // $this->setFKCheckOn();
        Eloquent::reguard();
    }
}
