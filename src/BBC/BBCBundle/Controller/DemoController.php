<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BBC\BBCBundle\Models\ServiceModel;
use BBC\BBCBundle\Models\BroadcastModel;

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
        $services = ServiceModel::fetchServices();
        return $this->render('BBCBundle:Demo:index.html.twig',
            $this->getBarlesque()
        );
    }

    public function scheduleAction($service_id)
    {
        $broadcasts = BroadcastModel::fetchServiceSchedule($service_id, strtotime('2013-09-20 00:00:00'), strtotime('2013-09-20 23:59:59'));

        return $this->render('BBCBundle:Demo:schedule.html.twig',
            $this->getBarlesque() + array('broadcasts' => $broadcasts)
        );
    }

    public function episodeAction()
    {
        return $this->render('BBCBundle:Demo:episode.html.twig',
            $this->getBarlesque()
        );
    }
}
