<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;

class GetChecklistRequest extends AbstractRequest
{

    /**
     * @var \LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist
     */
    protected $object;

    /**
     * @param Checklist $checklist
     */
    public function __construct(Checklist $checklist)
    {
        $this->object = $checklist;
    }

    /**
     * @return string
     */
    public function getRelativeUrl()
    {
        return 'checklists/' . $this->object->getId();
    }


}