<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Offer;
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
}