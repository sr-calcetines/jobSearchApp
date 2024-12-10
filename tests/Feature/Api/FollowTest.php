<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Offer;
use App\Models\Follow;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowTest extends TestCase
{
    use RefreshDatabase;

    public function test_StoreAddsNewsCorrectly()
    {
        $offer = Offer::factory()->create();

        $requestData = [
            'news' => ['News item 1', 'News item 2']
        ];

        $response = $this->postJson(route('apistorefollow', $offer->id), $requestData);

        $response->assertStatus(200);

        $response->assertJsonFragment(['message' => 'News added correctly']);

        $response->assertJsonFragment(['news' => 'News item 1']);
        $response->assertJsonFragment(['news' => 'News item 2']);

        $this->assertDatabaseCount('follows', 2);
        $this->assertDatabaseHas('follows', [
            'offer_id' => $offer->id,
            'news' => 'News item 1'
        ]);
        $this->assertDatabaseHas('follows', [
            'offer_id' => $offer->id,
            'news' => 'News item 2'
        ]);
    }

    public function test_StoreFailsWhenOfferNotFound()
    {
        $requestData = [
            'news' => ['News item 1', 'News item 2']
        ];

        $response = $this->postJson(route('apistorefollow', 999), $requestData);

        $response->assertStatus(404);

        $response->assertJsonFragment(['message' => 'Offer not found']);
    }

    public function test_IndexMethodWorksShowingAllElements()
    {   
        Offer::factory(10)->create();
        Follow::factory(1)->create([
            'news' => 'Test news',
            'offer_id' => 1,
        ]);

        $response = $this->get('/api/offers/1/follows');

        $response->assertStatus(200)->assertJsonCount(1);
    }



    public function test_IndexMethodWorksShowingOneElementById()
    {   
        Offer::factory(10)->create();
        Follow::factory(1)->create([
            'news' => 'Test news',
            'offer_id' => 1,
        ]);

        $response = $this->get('/api/offers/1/follows/1');

        $response->assertStatus(200)->assertJsonFragment(['offer_id' => 1]);
    }


    public function test_IfDeleteMethodEraseElementCorrectly()
    {   
        Offer::factory(10)->create();
        Follow::factory(1)->create([
            'news' => 'Test news',
            'offer_id' => 1,
        ]);
        
        $response = $this->delete('/api/offers/1/follows/1');
        $this->assertDatabaseCount('follows', 0);
    }

    public function test_IfUpdateMethodWorksCorrectly()
    {   
        Offer::factory(10)->create();
        Follow::factory(1)->create([
            'news' => 'Test news',
            'offer_id' => 1,
        ]);
        
        $response = $this->put('/api/offers/1/follows/1', 
        [
            'news' => 'Test news',
            'offer_id' => 1,
        ]);

        $response = $this->get('/api/offers/1/follows/1');

        $response->assertStatus(200)->assertJsonFragment([

            'news' => 'Test news',
            'offer_id' => 1,
        ]);
    }
}