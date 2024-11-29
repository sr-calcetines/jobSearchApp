<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Offer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfferTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfRecieveAllEntryOfOfferInJsonFile(){
        $offer = Offer::factory(2)->create();

        $response = $this->get(route('apihome'));
       
        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_CheckIfCanDeleteEntryInOfferWithApi(){
       
        $offer = Offer::factory(2)->create();

        $response = $this->delete(route('apidestroy', 1));

        $this->assertDatabaseCount('offers', 1);

        $response = $this->get(route('apihome'));
        $response->assertJsonCount(1);

    }

    public function test_CheckIfCanCreateNewEntryInOfferWithJsonFile()
    {
        $response = $this->post(route('apistore'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                ->assertJsonCount(1);
    }

    public function test_CheckIfCanUpdateEntryInJournalWithJsonFile()
    {
        $response = $this->post(route('apistore'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $data = ['enterprise' => 'Hello enterprise'];
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                ->assertJsonCount(1)
                ->assertJsonFragment($data);

        $response = $this->put('/api/offers/1', [
            'enterprise' => 'Hello easter',
            'position' => 'Hello egg',
            'state' => false
        ]);

        $data = ['enterprise' => 'Hello easter'];
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                ->assertJsonCount(1)
                ->assertJsonFragment($data);
    }

    public function test_CheckIfFunctionShowWorks(){
        $response = $this->post(route('apistore'), [
            'enterprise' => 'Hello easter',
            'position' => 'Hello egg',
            'state' => false
        ]);
        $data = ['enterprise' => 'Hello easter', 'position' => 'Hello egg', 'state' => 0];
        $response = $this->get(route('apishow', 1));
        $response->assertStatus(200)
                ->assertJsonCount(6)
                ->assertJsonFragment($data);
    }
}

