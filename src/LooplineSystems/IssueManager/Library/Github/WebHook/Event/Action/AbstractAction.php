<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\EventInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

abstract class AbstractAction implements ActionInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventInterface
     */
    protected $event;

    /**
     * @param EventInterface $event
     */
    public function setEvent(EventInterface $event)
    {
        $this->event = $event;
    }

}
