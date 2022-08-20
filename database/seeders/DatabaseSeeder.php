<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\Record;
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
        People::factory(10)->create();
        Record::factory(50)->create();
    }
}
