<?php

namespace BBC\BBCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BBC\BBCBundle\Models\ServiceModel;
use BBC\BBCBundle\Models\BroadcastModel;
use BBC\BBCBundle\Models\EpisodeModel;

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
    public function scheduleAction($service_id)
    {
        $broadcasts = BroadcastModel::fetchServiceSchedule($service_id, strtotime('2013-09-20 00:00:00'), strtotime('2013-09-20 23:59:59'));

        foreach($broadcasts as $cast) {
            $times = $cast->published_time->attributes();
            $image = $cast->image->attributes();

            $cast->start_time = strtotime($times['start']);
            $cast->end_time = strtotime($times['end']);
            $cast->image_href = str_replace('$recipe', '512x512', $image['template_url']);
        }

        return $this->render('BBCBundle:Demo:schedule.html.twig',
            $this->getBarlesque() + array('broadcasts' => $broadcasts)
        );
    }

    /**
     * episodeAction 
     * 
     * @access public
     * @return void
     */
    public function episodeAction($pid)
    {
        $episode = EpisodeModel::fetchEpisode($pid);
        $episode['imageHref'] = str_replace('$recipe', '512x512', $episode['imageHref']);
        return $this->render('BBCBundle:Demo:episode.html.twig',
            $this->getBarlesque() + array('episode' => $episode)
        );
    }
}
