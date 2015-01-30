<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\Issues;

use LooplineSystems\IssueManager\Library\Github\RepositoryInformation;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\IssuesEvent;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;
use LooplineSystems\IssueManager\Library\Trello\CardReference;

class OpenedAction extends AbstractIssuesAction
{
    /**
     * @var IssuesEvent
     */
    protected $event;

    public function __invoke()
    {
        $title = $this->event->getIssue()->getTitle();
        $this->loadCard($title, true);
        $this->loadChecklist($this->card, true);

        $repoInfo = $this->getRepositoryInformation();
        if (!$repoInfo || !$this->checklist) {
            return;
        }

        $checkItem = $this->getTrelloApiHelper()->getChecklistItemByRepositoryInformation($this->checklist, $repoInfo);
        if (! $checkItem) {
            $this->createNewItem($repoInfo, $title);
        } else {
            $this->updateItemIfStatusChanged($checkItem, ChecklistItem::STATUS_INCOMPLETE);
        }

    }

    /**
     * @param RepositoryInformation $repoInfo
     * @param string $title
     */
    protected function createNewItem(RepositoryInformation $repoInfo, $title)
    {
        $checklistItemTitle = CardReference::removeReferenceFromTitle($title);
        $this->getTrelloApiHelper()->createChecklistItem($this->checklist, $repoInfo, $checklistItemTitle);
    }

}
