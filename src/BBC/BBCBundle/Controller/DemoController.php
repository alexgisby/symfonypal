<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends BaseController
{
    public function indexAction()
    {
        return $this->render('BBCBundle:Demo:index.html.twig',
            $this->getBarlesque()
        );
    }
}
