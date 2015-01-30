<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

class CommentCardEvent extends AbstractCommentEvent
{
    /**
     * new comment on trello card added, push to github issues
     */
    public function trigger()
    {
        $comment = $this->trelloWebHook->getDtoContainer()->getTextDto()->getText();

        $this->addCommentsToIssues($comment);
    }
}
