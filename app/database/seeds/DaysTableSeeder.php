<?php

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Day::class, 1)->create();
    }
}
