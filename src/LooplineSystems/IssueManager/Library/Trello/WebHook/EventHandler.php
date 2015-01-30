<?php
namespace LooplineSystems\IssueManager\Library\Trello\WebHook;

use LooplineSystems\IssueManager\Bundle\Trello2GithubBundle\Controller\TrelloHooksController;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Event\CommentEventInterface;
use LooplineSystems\IssueManager\Library\Trello\WebHook\Event\EventInterface;
use LooplineSystems\IssueManager\Library\Logger\Logger;

class EventHandler implements TrelloConstants
{

    /**
     * @var string
     */
    protected $info;
    
    /**
     * @param EventInterface $event
     * @return string
     */
    public function handleEvent(EventInterface $event)
    {
        $event->trigger();

        //TODO check trigger response and log card not found or stuff like that

        $loggerMsg = 'Trello webHook call received. Event: ' . get_class($event) . ' - Type: ' . $event->getType();
        if ($event instanceof CommentEventInterface) {
            $loggerMsg .= ' (Updated Repositories: ' . $event->getCountUpdates() . ')';
        }
        
        $this->info .= $loggerMsg; 
        
        Logger::log(TrelloHooksController::TRELLO_HOOK_LOG, $loggerMsg);
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }
}
