<?php

use Illuminate\Database\Seeder;
use App\Models\Trophy;

class TrophiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Trophy::class, 10)->create();
    }
}
