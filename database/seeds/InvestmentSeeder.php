<?php

use App\Company;
use App\Investor;
use App\Investment;
use Illuminate\Database\Seeder;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyIds = Company::pluck('id');
        $investors = Investor::all();

        $investors->each(function ($investor) use ($companyIds) {
        	factory(Investment::class, rand(1, 8))->create([
        		'investor_id' => $investor->id,
        		'company_id' => $companyIds->random(),
        	]);
        });        
    }
}
