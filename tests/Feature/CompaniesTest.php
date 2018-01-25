<?php

namespace Tests\Feature;

use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompaniesTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    public function it_shows_the_companies_page()
    {
        $response = $this->get('/companies');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_creates_a_company()
    {
        $response = $this->json('POST', '/companies', [
            'name' => 'Hello', 'logo' => 'http://logo.com/logo.gif'
        ]);

        $response->assertStatus(200);

        // Add a database assertion here
    }

    // Write other tests

    /** @test */
    public function it_deletes_a_company()
    {
        $company = factory(Company::class)->create();

        $response = $this->json('DELETE', '/companies/' . $company->id);
        $response->assertStatus(200);

        $this->assertDatabaseMissing('companies', ['id' => $company->id]);
    }
}
