<?php

namespace Tests\Feature;

use App\Models\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfferTest extends TestCase
{
    use RefreshDatabase;
    public function test_ListOfEntryCanBeRead()
    {

        $this->withoutExceptionHandling();

        Offer::all();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('home');
    }

    public function test_CreateFunctionReturnViewCorrectly()
    {
        $response = $this->get('/create');

        $response->assertStatus(200)
            ->assertViewIs('create');
    }

    public function test_storeMethodSavesObjectCorrectly()
    {
        $response = $this->post(route('store'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $this->assertDatabaseCount('offers', 1);
    }

    public function test_checkIfShowViewWorksCorrectly()
    {
        $response = $this->post(route('store'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $response = $this->get('/show/1');

        $response->assertStatus(200)
            ->assertViewIs('show');
    }

    public function test_checkIfEditFormViewWorksCorrectly()
    {
        $response = $this->post(route('store'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $response = $this->get('/edit/1');

        $response->assertStatus(200)
            ->assertViewIs('edit');
    }

    public function test_checkIfUpdateMethodWorksCorrectly()
    {
        $response = $this->post(route('store'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $response = $this->post(route('update', 1), [
            'enterprise' => 'Hello',
            'position' => 'Hello',
            'state' => true
        ], );

        $offer = Offer::find(1);
        $this->assertEquals('Hello', $offer->enterprise);

    }

    public function test_checkIfDeleteMethodDestroyElement()
    {
        $response = $this->post(route('store'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);

        $response = $this->delete(route('destroy',1));
        $this->assertDatabaseCount('offers', 0);
    }

    public function test_checkIfRedirectViaActionToDeleteWorks(){
        $response = $this->post(route('store'), [
            'enterprise' => 'Hello enterprise',
            'position' => 'Hello position',
            'state' => true
        ]);
        $this->get('/?action=delete&id=1');
        $this->assertDatabaseCount('offers', 0);
    }
}