<?php

namespace BBC\BBCBundle\Tests\Lib;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use BBC\BBCBundle\Lib\NitroClient;

class NitroClientTest extends TestCase
{
    public function testConstruct()
    {
        $client = new NitroClient();
        $this->assertInstanceOf('BBC\\BBCBundle\\Lib\\NitroClient', $client);
    }

    public function testFetchServices()
    {
        $client = new NitroClient();
        $response = $client->fetchServices();
        
    }
}