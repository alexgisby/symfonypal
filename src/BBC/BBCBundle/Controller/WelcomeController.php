<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */

        $url = 'http://www.test.bbc.co.uk/frameworks/barlesque/orb/webservice.json';
        $data = \BBC\BBCBundle\Lib\HttpClient::getUrl($url);
        $orb = json_decode($data);

        return $this->render('BBCBundle:Welcome:index.html.twig',
            (array) $orb->barlesque
        );
    }
}
