<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * @return void
     */
    public function testSuccessResponse()
    {
        $data = [
            "first_distance" => 1.3,
            "first_type" => "meters",
            "second_distance" => 2.5,
            "second_type" => "yards",
            "return_type" => "yards"
        ];

        $response = $this->json('POST', '/api/calculate/sum-distance', $data)
            ->assertStatus(200)
            ->assertJsonStructure(['data']);

        $data = json_decode($response->content(), 1);

        $this->assertEquals(3.92, $data['data']);
    }

    /**
     * @return void
     */
    public function testMissingParametersReturnsError()
    {
        $data = [
            "first_distance" => 1.3,
            "second_distance" => 2.5,
            "second_type" => "yards",
            "return_type" => "yards"
        ];

        $this->json('POST', '/api/calculate/sum-distance', $data)
            ->assertStatus(400)
            ->assertJsonStructure(['error']);
    }

    /**
     * @return void
     */
    public function testInvalidTypeReturnsError()
    {
        $data = [
            "first_distance" => 1.3,
            "first_type" => "meters",
            "second_distance" => 2.5,
            "second_type" => "pounds",
            "return_type" => "yards"
        ];

        $response = $this->json('POST', '/api/calculate/sum-distance', $data)
            ->assertStatus(400)
            ->assertJsonStructure(['error']);

        $data = json_decode($response->content(), 1);

        $this->assertEquals("The selected second type is invalid.", $data['error']);
    }

    /**
     * @return void
     */
    public function testInvalidDistanceReturnsError()
    {
        $data = [
            "first_distance" => "string",
            "first_type" => "meters",
            "second_distance" => 2.5,
            "second_type" => "yards",
            "return_type" => "yards"
        ];

        $response = $this->json('POST', '/api/calculate/sum-distance', $data)
            ->assertStatus(400)
            ->assertJsonStructure(['error']);

        $data = json_decode($response->content(), 1);

        $this->assertEquals("The first distance must be a number.", $data['error']);
    }

    /**
     * @return void
     */
    public function testNegativeDistanceReturnsError()
    {
        $data = [
            "first_distance" => -1.3,
            "first_type" => "meters",
            "second_distance" => 2.5,
            "second_type" => "yards",
            "return_type" => "yards"
        ];

        $response = $this->json('POST', '/api/calculate/sum-distance', $data)
            ->assertStatus(400)
            ->assertJsonStructure(['error']);

        $data = json_decode($response->content(), 1);

        $this->assertEquals("Negative distances are invalid", $data['error']);
    }


}
