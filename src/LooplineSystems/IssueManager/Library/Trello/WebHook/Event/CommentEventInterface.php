<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

interface CommentEventInterface extends EventInterface
{

    /**
     * @return int
     */
    public function getCountUpdates();

}
