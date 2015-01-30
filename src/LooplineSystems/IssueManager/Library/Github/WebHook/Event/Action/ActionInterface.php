<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\EventInterface;

interface ActionInterface
{

    /**
     *
     */
    public function __invoke();

    /**
     * @param EventInterface $event
     * @return mixed
     */
    public function setEvent(EventInterface $event);

}
