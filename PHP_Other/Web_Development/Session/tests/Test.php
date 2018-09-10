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

    public function testLoginPass()
    {
        $response = $this->client->get('/');
        $body = $response->getBody()->getContents();
        $this->assertContains('Sign In', $body);

        $formParams = [
            'user' => [
                'name' => 'admin',
                'password' => 'secret'
            ]
        ];
        $response = $this->client->post('/session', [
            /* 'debug' => true, */
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('admin', $body);
        $this->assertContains('Sign Out', $body);

        $response = $this->client->delete('/session', [
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Sign In', $body);
    }

    public function testLoginFailWithWrongName()
    {
        $formParams = [
            'user' => [
                'name' => 'wrong',
                'password' => 'secret'
            ]
        ];
        $response = $this->client->post('/session', [
            /* 'debug' => true, */
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Wrong', $body);
    }

    public function testLoginFailWithWrongPassword()
    {
        $formParams = [
            'user' => [
                'name' => 'kate',
                'password' => 'secret'
            ]
        ];
        $response = $this->client->post('/session', [
            /* 'debug' => true, */
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Wrong', $body);
    }
}
