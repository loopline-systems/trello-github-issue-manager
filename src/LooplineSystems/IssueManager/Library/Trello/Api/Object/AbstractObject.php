<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Object;

abstract class AbstractObject
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $idBoard;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $idBoard
     */
    public function setIdBoard($idBoard)
    {
        $this->idBoard = $idBoard;
    }

    /**
     * @return int
     */
    public function getIdBoard()
    {
        return $this->idBoard;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}
