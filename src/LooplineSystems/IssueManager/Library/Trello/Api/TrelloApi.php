<?php
namespace LooplineSystems\IssueManager\Library\Trello\Api;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\IssueComment\Comment;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\CardRequest;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\CreateChecklistItemRequest;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\CreateChecklistRequest;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\CreateCommentRequest;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\GetChecklistRequest;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\UpdateChecklistItemRequest;

class TrelloApi extends AbstractTrelloApi
{

    /**
     * @param $shortLink
     * @return Card|null
     */
    public function getCardByShortLink($shortLink)
    {
        $card = new Card();
        $card->setShortLink($shortLink);

        $cardRequest = new CardRequest($card);

        /** @var Card $card */
        $card = $this->getResponse($cardRequest);
//        if (! $card->getIdShort()) {
//            return null;
//        }1

        return $card;
    }

    /**
     * @param $checklistId
     * @return Checklist|false
     */
    public function getChecklistById($checklistId)
    {
        $checklist = new Checklist();
        $checklist->setId($checklistId);

        $checklistRequest = new GetChecklistRequest($checklist);

        return $this->getResponse($checklistRequest);
    }

    /**
     * @param Checklist $checklist
     * @return Checklist
     */
    public function createChecklist(Checklist $checklist)
    {
        $checklistRequest = new CreateChecklistRequest($checklist);

        return $this->getResponse($checklistRequest);
    }

    /**
     * @param ChecklistItem $checklistItem
     * @return ChecklistItem
     */
    public function createChecklistItem(ChecklistItem $checklistItem)
    {
        $checklistItemRequest = new CreateChecklistItemRequest($checklistItem);

        return $this->getResponse($checklistItemRequest);
    }

    /**
     * @param Card $card
     * @param Checklist $checklist
     * @param ChecklistItem $checklistItem
     * @return ChecklistItem
     */
    public function updateChecklistItem(Card $card, Checklist $checklist, ChecklistItem $checklistItem)
    {
        $checklistItemRequest = new UpdateChecklistItemRequest($card, $checklist, $checklistItem);

        return $this->getResponse($checklistItemRequest);
    }

    /**
     * 
     * @param Card $card
     * @param $comment
     * @return Object\AbstractObject|null
     */
    public function createComment(Card $card, $comment)
    {
        $createCommentRequest = new CreateCommentRequest($card, $comment);
        
        return $this->getResponse($createCommentRequest);
    }
}
