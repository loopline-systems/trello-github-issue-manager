<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\IssueComment\CreatedAction;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\IssueComment\Comment;
use LooplineSystems\IssueManager\Library\ObjectPopulator;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Issues\Issue;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Issues\Sender;

class IssueCommentEvent extends AbstractEvent
{
    /**
     * @var Issue
     */
    protected $issue;

    /**
     * @var Comment
     */
    protected $comment;
    
    /**
     * @var Sender
     */
    protected $sender;

    /**
     * @param array $content
     */
    public function setContent(array $content)
    {
        parent::setContent($content);

        $this->setIssue($content);
        $this->setSender($content);
        $this->setComment($content);
    }

    /**
     *
     */
    public function triggerAction()
    {
        switch ($this->getAction()) {
            case self::ACTION_CREATED:
                $action = $this->container->get('issue_manager.github_webhook.event_issue_comment.action_created');
                break;
            default:
                $action = null;
                break;
        }

        $this->invokeAction($action);
    }

    /**
     * @param array $content
     */
    protected function setIssue(array $content)
    {
        if (array_key_exists(self::PARAM_ISSUE, $content)) {
            $this->issue = ObjectPopulator::populate(new Issue(), $content[self::PARAM_ISSUE]);
        }
    }

    /**
     * @param array $content
     */
    protected function setComment(array $content)
    {
        if (array_key_exists(self::PARAM_COMMENT, $content)) {
            $this->comment = ObjectPopulator::populate(new Issue(), $content[self::PARAM_COMMENT]);
        }
    }

    /**
     * @param array $content
     */
    protected function setSender(array $content)
    {
        if (array_key_exists(self::PARAM_SENDER, $content)) {
            $this->sender = ObjectPopulator::populate(new Sender(), $content[self::PARAM_SENDER]);
        }
    }

    /**
     * @return Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @return Issue
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * @return Comment
     */
    public function getComment()
    {
        return $this->comment;
    }
    
}
