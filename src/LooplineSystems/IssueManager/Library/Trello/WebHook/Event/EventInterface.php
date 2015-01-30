<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

interface EventInterface
{
    /**
     */
    public function trigger();

    /**
     * @return string
     */
    public function getType();

}
