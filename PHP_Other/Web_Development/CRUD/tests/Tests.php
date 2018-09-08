<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'http://localhost:8080',
            'cookies' => true
        ]);
    }

    public function testCourses()
    {
        $this->client->get('/');
        $this->client->get('/posts');
        $response = $this->client->get('/posts/new');
        $body = $response->getBody()->getContents();
        $this->assertContains('post[name]', $body);
        $this->assertContains('post[body]', $body);

        $formParams = ['post' => ['name' => '', 'body' => '']];
        $response = $this->client->post('/posts', [
            /* 'debug' => true, */
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains("Can't be blank", $body);

        $formParams = ['post' => ['name' => 'first', 'body' => 'last']];
        $response = $this->client->post('/posts', [
            /* 'debug' => true, */
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Post has been created', $body);
        $this->assertContains("first", $body);

        $formParams = ['post' => ['name' => 'second', 'body' => 'another']];
        $response = $this->client->post('/posts', [
            /* 'debug' => true, */
            'form_params' => $formParams
        ]);
        $body = $response->getBody()->getContents();
        $this->assertContains('Post has been created', $body);
        $this->assertContains('first', $body);
        $this->assertContains('second', $body);
    }
}
