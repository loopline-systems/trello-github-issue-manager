<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;

class CreateChecklistItemRequest extends AbstractRequest
{

    /**
     * @var \LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem
     */
    protected $object;

    protected $method = 'POST';

    /**
     * @param ChecklistItem $checklistItem
     */
    public function __construct(ChecklistItem $checklistItem)
    {
        $this->object = $checklistItem;
    }

    /**
     * @return string
     */
    public function getRelativeUrl()
    {
        return 'checklists/' . $this->object->getIdChecklist() . '/checkItems';
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'name' => $this->object->getName(),
            'pos' => $this->object->getPos(),
            'checked' => $this->object->getChecked(),
        ];
    }

}