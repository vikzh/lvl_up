<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new \GuzzleHttp\Client([
            'cookies' => true,
            'base_uri' => 'http://localhost:8080'
        ]);
    }

    public function testCourses()
    {
        $response = $this->client->get('/');
        $body = $response->getBody()->getContents();
        $this->assertContains('is empty', $body);
        $formParams = ['item' => ['id' => '1', 'name' => 'One']];
        $response = $this->client->post('/cart-items', [
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('One', $body);
        $this->assertContains('1', $body);

        $formParams = ['item' => ['id' => '1', 'name' => 'One']];
        $response = $this->client->post('/cart-items', [
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('One', $body);
        $this->assertContains('2', $body);

        $formParams = ['item' => ['id' => '2', 'name' => 'Two']];
        $response = $this->client->post('/cart-items', [
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Two', $body);
        $formParams = ['item' => ['id' => '2', 'name' => 'Two']];
        $response = $this->client->post('/cart-items', [
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Two', $body);

        $formParams = ['item' => ['id' => '2', 'name' => 'Two']];
        $response = $this->client->post('/cart-items', [
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Two', $body);
        $this->assertContains('3', $body);

        $response = $this->client->delete('/cart-items');
        $body = $response->getBody()->getContents();
        $this->assertContains('is empty', $body);
    }
}