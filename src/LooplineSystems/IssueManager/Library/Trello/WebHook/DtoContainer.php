<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook;

use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\ActionDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\BoardDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\CardDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\CheckItemDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\ChecklistDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\ListDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\OldDto;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\TextDto;

class DtoContainer implements \ArrayAccess, TrelloConstants
{
    /**
     * @var array
     */
    private $container;

    /**
     * @return BoardDto
     */
    public function getBoardDto()
    {
        return $this->offsetGet(self::DTO_BOARD);
    }

    /**
     * @return CardDto
     */
    public function getCardDto()
    {
        return $this->offsetGet(self::DTO_CARD);
    }

    /**
     * @return CheckItemDto
     */
    public function getCheckItemDto()
    {
        return $this->offsetGet(self::DTO_CHECK_ITEM);
    }

    /**
     * @return ChecklistDto
     */
    public function getChecklistDto()
    {
        return $this->offsetGet(self::DTO_CHECKLIST);
    }

    /**
     * @return ListDto
     */
    public function getListDto()
    {
        return $this->offsetGet(self::DTO_LIST);
    }

    /**
     * @return TextDto
     */
    public function getTextDto()
    {
        return $this->offsetGet(self::DTO_TEXT);
    }

    /**
     * @return OldDto
     */
    public function getOldDto()
    {
        return $this->offsetGet(self::DTO_OLD);
    }

    /**
     * @return ActionDto
     */
    public function getActionDto()
    {
        return $this->offsetGet(self::DTO_ACTION);
    }
    
    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

}
