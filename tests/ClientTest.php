<?php

use Champion\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_creates_a_client()
    {
        $client = new Client();
        
        $this->assertInstanceOf('\Champion\Client', $client);
    }
}
