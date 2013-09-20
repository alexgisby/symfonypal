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

        $client = new \BBC\BBCBundle\Lib\NitroClient();

        return $this->render('BBCBundle:Welcome:index.html.twig');
    }
}
