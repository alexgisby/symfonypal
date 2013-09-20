<?php

namespace BBC\BBCBundle\Lib;

class NitroClient
{
    const BASE_URL = 'http://d.bbc.co.uk/nitro/api';
    const API_KEY = 'qsyftbsdnprjqw9sxy4fvz2e';

    /**
     * @param   array   Service Types to find
     */
    public function fetchServices(array $types = array('TV', 'Local Radio', 'National Radio', 'Regional Radio'))
    {
        $query = array();
        foreach($types as $type) {
            $query[] = 'service_type=' . urlencode($type);
        }

        $query_string = '?' . implode('&', $query);

        $url = self::BASE_URL . '/services' . $query_string . '&api_key=' . self::API_KEY;

        
        exit($url . PHP_EOL);

        $url = self::BASE_URL . '/services';
        $url = http_build_query(array(

        ));
    }
}