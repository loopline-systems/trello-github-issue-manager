<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;

class CardRequest extends AbstractRequest
{

    /**
     * @param Card $card
     */
    public function __construct(Card $card)
    {
        $this->object = $card;
    }

    /**
     * @return string
     */
    public function getRelativeUrl()
    {
        return 'cards/' . $this->object->getShortLink();
    }

}