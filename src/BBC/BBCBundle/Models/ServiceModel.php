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
        $url = 'http://d.bbc.co.uk/nitro/api/services/?api_key=qsyftbsdnprjqw9sxy4fvz2e';
        $client = new NitroClient();

        $query = $client->fetchServices();
    }
}