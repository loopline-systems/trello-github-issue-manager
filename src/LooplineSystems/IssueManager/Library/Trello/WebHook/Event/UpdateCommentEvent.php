<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

class UpdateCommentEvent extends AbstractCommentEvent
{
    /**
     * Update an existing Comment on a Trello Card
     */
    public function trigger()
    {
        $comment = $this->trelloWebHook->getDtoContainer()->getActionDto()->getText();
        
        $this->addCommentsToIssues($comment);
    }
}
