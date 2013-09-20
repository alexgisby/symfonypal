<?php 

namespace BBC\BBCBundle\lib;

class HttpClient
{
    static public function getUrl($url)
    {
        $proxy = 'www-cache.reith.bbc.co.uk:80';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
