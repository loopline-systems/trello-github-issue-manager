<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\EventInterface;

class EventHandler
{
    /**
     * @var EventInterface
     */
    protected $event;

    /**
     * @param EventInterface $event
     */
    public function handleEvent(EventInterface $event)
    {
        $this->event = $event;

        $this->event->triggerAction();
    }

    /**
     * @return string
     */
    public function getLogMessage()
    {
        return 'GitHub webHook call received. Event: ' . get_class($this->event) . ' - Action: ' . $this->event->getAction();
    }

}
