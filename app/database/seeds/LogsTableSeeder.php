<?php

use Illuminate\Database\Seeder;
use App\Models\Log;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Log::class, 10)->create();
    }
}
