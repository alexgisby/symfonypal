<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function getBarlesque()
    {
        $url = 'http://www.test.bbc.co.uk/frameworks/barlesque/orb/webservice.json';
        $data = \BBC\BBCBundle\Lib\HttpClient::getUrl($url);
        $orb = json_decode($data);
        return (array) $orb->barlesque;
    }
}
