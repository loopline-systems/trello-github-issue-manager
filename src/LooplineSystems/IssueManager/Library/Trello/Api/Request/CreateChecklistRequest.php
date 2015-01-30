<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;

class CreateChecklistRequest extends AbstractRequest
{

    /**
     * @var \LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist
     */
    protected $object;

    protected $method = 'POST';

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
        return 'checklists';
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'name' => $this->object->getName(),
            'idBoard' => $this->object->getIdBoard(),
            'idCard' => $this->object->getIdCard(),
        ];
    }

}