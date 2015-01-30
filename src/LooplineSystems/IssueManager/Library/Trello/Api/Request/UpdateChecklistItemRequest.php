<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;
use \LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;

class UpdateChecklistItemRequest extends AbstractRequest
{

    /**
     * @var \LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem
     */
    protected $object;

    /**
     * @var Card
     */
    protected $card;

    /**
     * @var Checklist
     */
    protected $checklist;

    protected $method = 'PUT';

    /**
     * @param ChecklistItem $checklistItem
     */
    public function __construct(Card $card, Checklist $checklist, ChecklistItem $checklistItem)
    {
        $this->object = $checklistItem;

        $this->card = $card;
        $this->checklist = $checklist;
    }

    /**
     * @return string
     */
    public function getRelativeUrl()
    {
        return 'cards/' . $this->card->getId() . '/checklist/' . $this->checklist->getId() . '/checkItem/' . $this->object->getId() . '/state';
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'value' => $this->object->getChecked(),
        ];
    }

}