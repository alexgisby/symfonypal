<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends BaseController
{
    public function indexAction()
    {
        return $this->render('BBCBundle:Welcome:index.html.twig',
            $this->getBarlesque()
        );
    }
}
