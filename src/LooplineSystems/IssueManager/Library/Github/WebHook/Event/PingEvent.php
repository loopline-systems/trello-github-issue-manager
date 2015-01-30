<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\Issues\ClosedAction;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\Issues\OpenedAction;
use LooplineSystems\IssueManager\Library\ObjectPopulator;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Issues\Issue;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Issues\Sender;

class PingEvent extends AbstractEvent
{

    /**
     * @param array $content
     */
    public function setContent(array $content)
    {
        parent::setContent($content);
    }

    /**
     *
     */
    public function triggerAction()
    {
        // NOOP
    }


}
