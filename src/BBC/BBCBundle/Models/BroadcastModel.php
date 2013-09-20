<?php

namespace BBC\BBCBundle\Models;
use BBC\BBCBundle\Models\BaseModel;
use BBC\BBCBundle\Lib\NitroClient;

/**
 * Base Model
 */
class BroadcastModel extends BaseModel
{
    public static function fetchServiceSchedule($service_id, $from, $to)
    {
        $client = new NitroClient();

        $resultset = $client->fetchServiceBroadcasts($service_id, $from, $to, 200);

        return $resultset;
    }
}