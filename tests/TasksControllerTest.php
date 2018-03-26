<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TasksControllerTest extends WebTestCase
{
    public function testGet()
    {
        $client = static::createClient();
        $client->request('GET', '/tasks');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testPost()
    {
        $client = static::createClient();
        $client->request('POST', '/tasks');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testPut()
    {
        $client = static::createClient();
        $client->request('PUT', '/tasks/1');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testDelete()
    {
        $client = static::createClient();
        $client->request('DELETE', '/tasks/1');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}
