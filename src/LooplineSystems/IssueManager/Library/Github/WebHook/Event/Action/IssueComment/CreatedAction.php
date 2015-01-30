<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\IssueComment;

use LooplineSystems\IssueManager\Library\Github\IssueReference;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\AbstractAction;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\IssueCommentEvent;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;
use LooplineSystems\IssueManager\Library\Trello\Api\TrelloApiHelper;
use LooplineSystems\IssueManager\Library\Trello\CardReference;

class CreatedAction extends AbstractAction
{
    const PUSH_TO_TRELLO_PHRASE = 'trello';

    /**
     * @var IssueCommentEvent
     */
    protected $event;

    /**
     * do it..
     */
    public function __invoke()
    {
        $comment = $this->event->getComment()->getBody();
        
        $title = $this->event->getIssue()->getTitle();
        $trelloCardShortLink = CardReference::getCardShortLinkFromTitle($title);


        $trelloApiHelper = $this->container->get('issue_manager.trello_api.api_helper');

        $api = $trelloApiHelper->getTrelloApi();

        $card = $trelloApiHelper->getTrelloApi()->getCardByShortLink($trelloCardShortLink);
        
        if ($this->pushToTrelloMentionedInComment($comment)) {
            $trelloApiHelper->getTrelloApi()->createComment(
                $card,
                $this->prepareComment($comment)
            );
        }
    }

    /**
     * @param $comment
     * @return bool
     */
    private function pushToTrelloMentionedInComment($comment)
    {
        $pattern = sprintf(
            '/\[(%s|%s|%s)\]/U',
            self::PUSH_TO_TRELLO_PHRASE,
            strtoupper(self::PUSH_TO_TRELLO_PHRASE),
            ucfirst(self::PUSH_TO_TRELLO_PHRASE)
        );
        
        if (preg_match_all($pattern, $comment)) {
            return true;
        }
        
        return false;
    }

    /**
     * @param $comment
     * @return string
     */
    protected function prepareComment($comment)
    {
        $replaceWords = [
            '[' . self::PUSH_TO_TRELLO_PHRASE . ']',
            '[' . strtoupper(self::PUSH_TO_TRELLO_PHRASE) . ']',
            '[' . ucfirst(self::PUSH_TO_TRELLO_PHRASE) . ']'
        ];
        
        $comment = str_replace($replaceWords, '', $comment);
        
        return
            $comment .PHP_EOL . PHP_EOL .
            '---' . PHP_EOL .
            $this->event->getIssue()->getHtmlUrl()
            ;
    }
}
