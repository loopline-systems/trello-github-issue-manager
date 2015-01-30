<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Object;

use LooplineSystems\IssueManager\Library\ObjectPopulator;

class Checklist extends AbstractObject
{
    const DEFAULT_NAME = 'Github issues';

    protected $idCard;
    protected $pos;
    protected $checkItems;

    /**
     *
     */
    public function __construct()
    {
        $this->name = self::DEFAULT_NAME;
    }

    /**
     * @param mixed $checkItems
     */
    public function setCheckItems($checkItems)
    {
        $this->checkItems = $checkItems;
    }

    /**
     * @return array
     */
    public function getCheckItems()
    {
        return $this->checkItems;
    }

    /**
     * @param mixed $idCard
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;
    }

    /**
     * @return mixed
     */
    public function getIdCard()
    {
        return $this->idCard;
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
