<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\Issues;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\IssuesEvent;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;

class ClosedAction extends AbstractIssuesAction
{
    /**
     * @var IssuesEvent
     */
    protected $event;

    public function __invoke()
    {
        $title = $this->event->getIssue()->getTitle();
        $this->loadCard($title, true);
        $this->loadChecklist($this->card);

        $checkItem = $this->getTrelloApiHelper()->getChecklistItemByRepositoryInformation($this->checklist, $this->getRepositoryInformation());
        if ($checkItem) {
            $this->updateItemIfStatusChanged($checkItem, ChecklistItem::STATUS_COMPLETE);
        }
    }

}
