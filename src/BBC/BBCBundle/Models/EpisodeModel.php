<?php

namespace BBC\BBCBundle\Models;
use BBC\BBCBundle\Models\BaseModel;
use BBC\BBCBundle\Lib\NitroClient;

/**
 * Episode Model
 */
class EpisodeModel extends BaseModel
{
    public static function fetchEpisode($pid)
    {
        $client = new NitroClient();

        $episode = $client->fetchEpisode($pid)->getEpisode();

        return array(
            'pid' => $episode->pid,
            'title' => $episode->presentation_title,
            'imageHref' => (string)$episode->image['template_url'],
            'shortSynopsis' => $episode->synopses->short,
            'mediumSynopsis' => $episode->synopses->medium,
            'longSynopsis' => $episode->synopses->long
        );
    }
}