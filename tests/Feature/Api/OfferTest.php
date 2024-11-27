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
}
