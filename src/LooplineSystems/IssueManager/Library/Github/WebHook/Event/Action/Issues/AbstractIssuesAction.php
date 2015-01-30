<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\Issues;

use LooplineSystems\IssueManager\Library\Github\IssueReference;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\AbstractAction;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\IssuesEvent;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;
use LooplineSystems\IssueManager\Library\Trello\Api\TrelloApi;
use LooplineSystems\IssueManager\Library\Trello\Api\TrelloApiHelper;
use LooplineSystems\IssueManager\Library\Trello\CardReference;

abstract class AbstractIssuesAction extends AbstractAction
{

    /**
     * @var TrelloApiHelper
     */
    protected $trelloApiHelper;

    /**
     * @var Card
     */
    protected $card;

    /**
     * @var Checklist
     */
    protected $checklist;


    /**
     * @param string $title
     * @return Card|null
     */
    protected function getCardByTitle($title)
    {
        $trelloCardShortLink = CardReference::getCardShortLinkFromTitle($title);

        return $this->getTrelloApi()->getCardByShortLink($trelloCardShortLink);
    }


    /**
     * @param Card $card
     * @param Checklist $checklist
     * @param ChecklistItem $checkItem
     * @param string $newState
     */
    protected function updateItemIfStatusChanged(ChecklistItem $checkItem, $newState)
    {
        if ($checkItem->getChecked() != $newState) {
            $checkItem->setChecked($newState);
            $this->getTrelloApi()->updateChecklistItem($this->card, $this->checklist, $checkItem);
        }
    }

    /**
     * @param string $title
     */
    protected function loadCard($title)
    {
        $this->card = $this->getCardByTitle($title);
    }

    /**
     * @param Card $card
     * @param bool $createChecklistIfNotExisting
     */
    protected function loadChecklist(Card $card, $createChecklistIfNotExisting = false)
    {
        $this->checklist = $this->getTrelloApiHelper()->getChecklistFromCard($card, $createChecklistIfNotExisting);
    }

    /**
     * @return bool|\LooplineSystems\IssueManager\Library\Github\RepositoryInformation
     */
    protected function getRepositoryInformation()
    {
        return IssueReference::getRepositoryInformationFromUrl($this->event->getIssue()->getUrl());
    }


    /**
     * @return TrelloApiHelper
     */
    protected function getTrelloApiHelper()
    {
        if (! $this->trelloApiHelper) {
            $this->trelloApiHelper = $this->container->get('issue_manager.trello_api.api_helper');
            $this->trelloApiHelper->setApi();
        }

        return $this->trelloApiHelper;
    }

    /**
     * @return TrelloApi
     */
    protected function getTrelloApi()
    {
        return $this->getTrelloApiHelper()->getTrelloApi();
    }

}
