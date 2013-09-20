<?php

namespace BBC\BBCBundle\Lib;
use BBC\BBCBundle\Lib\NitroResponse;

class NitroClient
{
    const BASE_URL = 'http://d.bbc.co.uk/nitro/api';
    const API_KEY = 'qsyftbsdnprjqw9sxy4fvz2e';

    /**
     * @param   array   Service Types to find
     */
    public function fetchServices(
        array $types = array('TV', 'Local Radio', 'National Radio', 'Regional Radio'),
        $limit
    ){
        $query = array();
        foreach($types as $type) {
            $query[] = 'service_type=' . urlencode($type);
        }

        $query_string = '?' . implode('&', $query);
        $query_string .= '&page_size=' . $limit;

        $url = self::BASE_URL . '/services' . $query_string . '&api_key=' . self::API_KEY;

        $response = \BBC\BBCBundle\Lib\HttpClient::getUrl($url);
        $doc = simplexml_load_string($response);
        return new NitroResponse($doc);
    }

    public function fetchServiceBroadcasts($sid, $from, $to, $limit)
    {
        $query = array(
            'sid' => urlencode($sid),
            'start_from' => date('c', $from),
            'end_to' => date('c', $to),
            'page_size' => (int)$limit,
            'api_key' => self::API_KEY,
            'mixin' => 'titles'
        );

        $url = self::BASE_URL . '/broadcasts?' . http_build_query($query);
        $response = \BBC\BBCBundle\Lib\HttpClient::getUrl($url);
        $doc = simplexml_load_string($response);

        return $doc->results->broadcast;
    }


    public function fetchEpisode($pid){
        $url = self::BASE_URL . '/programmes?pid=' . $pid . '&entity_type=episode&api_key=' . self::API_KEY;

        $response = \BBC\BBCBundle\Lib\HttpClient::getUrl($url);
        $doc = simplexml_load_string($response);
        return new NitroResponse($doc);
    }
}