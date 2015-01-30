<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;

class CreateCommentRequest extends AbstractRequest
{

    /**
     * @var Card
     */
    protected $card;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * @param Card $card
     * @param $comment
     */
    public function __construct(Card $card, $comment)
    {
        $this->card = $card;
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getRelativeUrl()
    {
        return 'cards/' . $this->card->getId() . '/actions/comments';
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'text' => $this->comment,
        ];
    }

}
