<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Object;

class ChecklistItem extends AbstractObject
{
    const STATUS_COMPLETE = 'complete';
    const STATUS_INCOMPLETE = 'incomplete';


    protected $idChecklist;

    protected $pos;
    protected $checked = false;

    /**
     * @param mixed $idChecklist
     */
    public function setIdChecklist($idChecklist)
    {
        $this->idChecklist = $idChecklist;
    }

    /**
     * @return mixed
     */
    public function getIdChecklist()
    {
        return $this->idChecklist;
    }

    /**
     * @param mixed $checked
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    /**
     * @return mixed
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * @param mixed $pos
     */
    public function setPos($pos)
    {
        $this->pos = $pos;
    }

    /**
     * @return mixed
     */
    public function getPos()
    {
        return $this->pos;
    }

}
