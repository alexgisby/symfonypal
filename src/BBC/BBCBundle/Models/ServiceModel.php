<?php

namespace BBC\BBCBundle\Models;
use BBC\BBCBundle\Models\BaseModel;
use BBC\BBCBundle\Lib\NitroClient;

/**
 * Base Model
 */
class ServiceModel extends BaseModel
{
    public static function fetchServices()
    {
        $client = new NitroClient();

        $resultset = $client->fetchServices(
            array('TV', 'Local Radio', 'National Radio', 'Regional Radio'), 
            200
        );

        $resultset->setInstanceClass('BBC\\BBCBundle\\Models\\ServiceModel');

        return $resultset;
    }
}