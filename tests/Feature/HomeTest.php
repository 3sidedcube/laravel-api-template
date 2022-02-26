<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_the_home_route_can_be_successfully_called()
    {
        $this->getJson('/')
            ->assertStatus(200)
            ->assertJson([]);
    }
}
