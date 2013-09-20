<?php

namespace BBC\BBCBundle\EventListener;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use BBC\BBCBundle\Twig\Extension\DemoExtension;

class ControllerListener
{
    protected $extension;

    public function __construct(DemoExtension $extension)
    {
        $this->extension = $extension;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        die('fdgdf');
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->extension->setController($event->getController());
        }
    }
}
