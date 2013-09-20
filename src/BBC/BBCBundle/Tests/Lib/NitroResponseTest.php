<?php

namespace BBC\BBCBundle\Tests\Lib;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use BBC\BBCBundle\Lib\NitroClient;

class NitroResponseTest extends TestCase
{
    public function testIteratorAndCount()
    {
        $client = new NitroClient();
        $response = $client->fetchServices(
            array('TV', 'Local Radio', 'National Radio', 'Regional Radio'),
            200
        );

        $response->setInstanceClass('BBC\\BBCBundle\\Models\\ServiceModel');
        
        foreach($response as $item) {
            $this->assertInstanceOf('BBC\\BBCBundle\\Models\\ServiceModel', $item);
        }

        $this->assertCount(137, $response);
    }
}