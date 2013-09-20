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
}