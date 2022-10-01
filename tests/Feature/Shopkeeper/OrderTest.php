<?php

namespace Tests\Feature\Shopkeeper;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_set_shopkeeper()
    {
        $response  = $this->json('POST','/api/v1/shopkeeper/order',[
            'productIds' => [1,2],
        ]);

        dd($response);
    }
}
