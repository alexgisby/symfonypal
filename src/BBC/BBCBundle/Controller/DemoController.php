<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BBC\BBCBundle\Models\ServiceModel;

class DemoController extends BaseController
{
    /**
     * indexAction 
     * 
     * @access public
     * @return void
     */
    public function indexAction()
    {
        $rawservices = ServiceModel::fetchServices();
        $tv_services = $radio_services = array();
        $regions = array();
        foreach ($rawservices as $s) {
            $obj = array(
                'id'=>(string)$s->sid,
                'type'=>(string)$s->type,
                'name'=>(string)$s->name,
            );
            $obj['description'] = (isset($s->description))?(string)$s->description:'No description';

            if ($obj['type'] === 'TV') {
                $tv_services[] = $obj;
            } else {
                $radio_services[] = $obj;
            }
            if (isset($s->region)) {
                $regions[ucfirst((string)$s->region)] = true;
            }
        }
        $regions = array_keys($regions);
        sort($regions);

        $viewData = $this->getBarlesque();
        $viewData['radio_services'] = $radio_services;
        $viewData['tv_services'] = $tv_services;
        $viewData['regions'] = $regions;
        return $this->render('BBCBundle:Demo:index.html.twig', $viewData);
    }

    /**
     * servicesAction 
     * 
     * @access public
     * @return void
     */
    public function servicesAction()
    {
        return $this->render('BBCBundle:Demo:index.html.twig',
            $this->getBarlesque()
        );
    }

    /**
     * scheduleAction 
     * 
     * @access public
     * @return void
     */
    public function scheduleAction()
    {
        return $this->render('BBCBundle:Demo:schedule.html.twig',
            $this->getBarlesque()
        );
    }

    /**
     * episodeAction 
     * 
     * @access public
     * @return void
     */
    public function episodeAction()
    {
        return $this->render('BBCBundle:Demo:episode.html.twig',
            $this->getBarlesque()
        );
    }
}
