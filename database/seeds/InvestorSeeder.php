<?php

use App\Investor;
use Illuminate\Database\Seeder;

class InvestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Investor::truncate();

        factory(Investor::class, 20)->create();
    }
}
