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

    public function servicesAction()
    {
        return $this->render('BBCBundle:Demo:index.html.twig',
            $this->getBarlesque()
        );
    }

    public function scheduleAction()
    {
        return $this->render('BBCBundle:Demo:schedule.html.twig',
            $this->getBarlesque()
        );
    }

    public function episodeAction()
    {
        return $this->render('BBCBundle:Demo:episode.html.twig',
            $this->getBarlesque()
        );
    }
}
