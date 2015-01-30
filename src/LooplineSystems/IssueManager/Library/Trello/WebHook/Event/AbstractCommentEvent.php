<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

use LooplineSystems\IssueManager\Bundle\Trello2GithubBundle\Controller\TrelloHooksController;
use LooplineSystems\IssueManager\Library\Github\Api\GithubApi;
use LooplineSystems\IssueManager\Library\Github\IssueReference;
use LooplineSystems\IssueManager\Library\Github\RepositoryInformation;
use LooplineSystems\IssueManager\Library\Logger\Logger;
use LooplineSystems\IssueManager\Library\ObjectPopulator;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;

abstract class AbstractCommentEvent extends AbstractEvent implements CommentEventInterface
{
    
    const PUSH_TO_ALL_REPOS_PHRASE = 'all';

    /**
     * indicates that [all] was part of the comment
     * 
     * @var bool
     */
    protected $pushToAllRepos = false;

    /**
     * contains all exact repository matches e.g. [api/12]
     * 
     * @var RepositoryInformation[]
     */
    protected $mentionedIssues = [];
    
    /**
     * contains all global repo matches e.g. [api]
     * 
     * @var array
     */
    protected $mentionedRepositories = [];

    /**
     * count the actual comments that have been done
     * 
     * @var int
     */
    protected $countUpdates = 0;

    /**
     * @return int
     */
    public function getCountUpdates()
    {
        return $this->countUpdates;
    }

    /**
     * will be used by all concrete classes of the AbstractCommentEvent needs the proper message
     * that must be read differently in each implementation
     * 
     * @param $comment
     * @return bool
     */
    protected function addCommentsToIssues($comment)
    {
        
        $checklist = $this->loadCheckListByCard();
        if (! $checklist) {
            return false;
        }

        if (! $this->checkIfRepositoriesMentionedInComment($comment)) {
            return false;
        }

        $preparedComment = $this->prepareComment($comment, $checklist);

        //--___________________________________________________-->
        //-- check if repository mentioned and store mentioned ones
        foreach ($checklist->getCheckItems() as $checkItem) {
            if (! ($checkItem instanceof ChecklistItem)) {

                //--___________________________________________________-->
                //-- prepare

                /* @var CheckListItem  $checkListItem */
                $checkListItem = ObjectPopulator::populate(new ChecklistItem(), $checkItem);
                $checkListItemName = $checkListItem->getName();
                $repositoryInformationFromChecklistItemName = IssueReference::getRepositoryInformationFromUrl($checkListItemName);

                //--___________________________________________________-->
                //-- check if repository exists
                try {
                    $this->githubClient->issues()->show(
                        $this->getGithubUserName(),                                         //username
                        $repositoryInformationFromChecklistItemName->getRepositoryName(),   //repo
                        $repositoryInformationFromChecklistItemName->getIssueId()           //issue
                    );
                } catch (\Github\Exception\RuntimeException $runtimeException) {
                    $notFoundMsg = 'Github issue not found. ' . $this->getGithubUserName() . '/' . $repositoryInformationFromChecklistItemName->getRepositoryName() . '/' . $repositoryInformationFromChecklistItemName->getIssueId();
                    Logger::log(TrelloHooksController::TRELLO_HOOK_LOG, $notFoundMsg);
                    continue;
                }

                //--___________________________________________________-->
                //-- push to all repos will skip this step, otherwise check if we shall add the comment on the current one
                if (! $this->pushToAllRepos) {
                    if (! $this->checkIfCurrentRepositoryWasMentioned($repositoryInformationFromChecklistItemName)) {
                        $notFoundMsg = 'Skipping Github issue. Not mentioned. ' . $this->getGithubUserName() . '/' . $repositoryInformationFromChecklistItemName->getRepositoryName() . '/' . $repositoryInformationFromChecklistItemName->getIssueId();
                        Logger::log(TrelloHooksController::TRELLO_HOOK_LOG, $notFoundMsg);
                        continue;
                    }
                }
                
                //--___________________________________________________-->
                //-- Add comment on github
                $response = $this->githubClient->issues()->comments()->create(
                    $this->getGithubUserName(),                                              //username
                    $repositoryInformationFromChecklistItemName->getRepositoryName(),   //repo
                    $repositoryInformationFromChecklistItemName->getIssueId(),          //issue
                    array('body' => $preparedComment)                                   //params
                );
                
                $this->countUpdates++;
            }
        }
        
        return true;
    }

    /**
     * @param $comment
     * @param Checklist $checklist
     * @return mixed|string
     */
    protected function prepareComment($comment, Checklist $checklist)
    {
 
        $card = $this->loadCard();
        
        $comment =
            $comment . PHP_EOL. PHP_EOL.
            '---' . PHP_EOL .
            $this->getTrelloBadge($card)
        ;
        
        if ($this->pushToAllRepos) {
            $comment = $this->prepareBadgeCommentForAllRepositories($comment, $checklist);
        } else {
            $comment = $this->prepareBadgeCommentForMentionedIssues($comment);
            $comment = $this->prepareBadgeCommentForMentionedRepositories($comment, $checklist);
        }
        
        return $comment;
    }

    /**
     * @param $comment
     * @param Checklist $checklist
     * @return mixed|string
     */
    private function prepareBadgeCommentForAllRepositories($comment, Checklist $checklist)
    {
        $replaceWords = [];

        

        //--___________________________________________________-->
        //-- add badge for all checkitems
        foreach ($checklist->getCheckItems() as $checkItem) {
            if (! ($checkItem instanceof ChecklistItem)) {

                //--___________________________________________________-->
                //-- prepare

                /* @var CheckListItem  $checkListItem */
                $checkListItem = ObjectPopulator::populate(new ChecklistItem(), $checkItem);
                $checkListItemName = $checkListItem->getName();
                $repositoryInformationFromChecklistItemName = IssueReference::getRepositoryInformationFromUrl($checkListItemName);

                //--___________________________________________________-->
                //-- check if repository exists
                try {
                    $this->githubClient->issues()->show(
                        $this->getGithubUserName(),                                         //username
                        $repositoryInformationFromChecklistItemName->getRepositoryName(),   //repo
                        $repositoryInformationFromChecklistItemName->getIssueId()           //issue
                    );
                } catch (\Github\Exception\RuntimeException $runtimeException) {
                    continue;
                }
                
                //--___________________________________________________-->
                //-- add issue badge if repository was mentioned
                $comment .= $this->getIssueBadge($repositoryInformationFromChecklistItemName);
                
            }
        }

        $replaceWords[] = '[' . self::PUSH_TO_ALL_REPOS_PHRASE . ']';
        $comment = str_replace($replaceWords, '', $comment);

        return $comment;
    }

    /**
     * @param $comment
     * @param Checklist $checklist
     * @return mixed|string
     */
    private function prepareBadgeCommentForMentionedRepositories($comment, Checklist $checklist)
    {
        $replaceWords = [];

        /* @var RepositoryInformation $mentionedIssue */
        foreach ($this->mentionedRepositories as $mentionedRepository) {

            //--___________________________________________________-->
            //-- if checklist items are mentioned add badge
            foreach ($checklist->getCheckItems() as $checkItem) {
                if (! ($checkItem instanceof ChecklistItem)) {

                    //--___________________________________________________-->
                    //-- prepare

                    /* @var CheckListItem  $checkListItem */
                    $checkListItem = ObjectPopulator::populate(new ChecklistItem(), $checkItem);
                    $checkListItemName = $checkListItem->getName();
                    $repositoryInformationFromChecklistItemName = IssueReference::getRepositoryInformationFromUrl($checkListItemName);

                    //--___________________________________________________-->
                    //-- check if repository exists
                    try {
                        $this->githubClient->issues()->show(
                            $this->getGithubUserName(),                                         //username
                            $repositoryInformationFromChecklistItemName->getRepositoryName(),   //repo
                            $repositoryInformationFromChecklistItemName->getIssueId()           //issue
                        );
                    } catch (\Github\Exception\RuntimeException $runtimeException) {
                        continue;
                    }
                    
                    //--___________________________________________________-->
                    //-- add issue badge if repository was mentioned
                    if ($repositoryInformationFromChecklistItemName->getRepositoryName() == $mentionedRepository) {
                        $comment .= $this->getIssueBadge($repositoryInformationFromChecklistItemName);
                    }
                }
            }

            $replaceWords[] = '[' . $mentionedRepository . ']';
        }

        $comment = str_replace($replaceWords, '', $comment);

        return $comment;
    }
    
    /**
     * @param $comment
     * @return mixed|string
     */
    private function prepareBadgeCommentForMentionedIssues($comment)
    {
        $replaceWords = [];
        
        /* @var RepositoryInformation $mentionedIssue */
        foreach ($this->mentionedIssues as $mentionedIssue) {

            //--___________________________________________________-->
            //-- check if repository exists
            try {
                $this->githubClient->issues()->show(
                    $this->getGithubUserName(),             //username
                    $mentionedIssue->getRepositoryName(),   //repo
                    $mentionedIssue->getIssueId()           //issue
                );
            } catch (\Github\Exception\RuntimeException $runtimeException) {
                continue;
            }

            $comment .= $this->getIssueBadge($mentionedIssue);
            $replaceWords[] = '[' . $mentionedIssue->getRepositoryName() . '/' . $mentionedIssue->getIssueId() .']';
        }

        $comment = str_replace($replaceWords, '', $comment);
        
        return $comment;
    }

    /**
     * @param RepositoryInformation $repositoryInfo
     * @return string
     */
    private function getIssueBadge(RepositoryInformation $repositoryInfo)
    {
        // TODO: make colors configurable
        switch($repositoryInfo->getRepositoryName()) {
            case 'frontend':    $color = 'yellow';
                                break;
            case 'api':         $color = 'orange';
                break;
            default:            $color = 'blue';
        }

        return sprintf(
            '<a target=_blank href="https://github.com/%s/%s/issues/%s"><img src="http://img.shields.io/badge/%s-%s-%s.svg" /></a> ',
            $repositoryInfo->getRepositoryNamespace(),
            $repositoryInfo->getRepositoryName(),
            $repositoryInfo->getIssueId(),
            $repositoryInfo->getRepositoryName(),
            $repositoryInfo->getIssueId(),
            $color
        );
    }
    
    /**
     * @param Card $card
     * @return string
     */
    private function getTrelloBadge(Card $card)
    {
        return sprintf(
            '<a target=_blank href="%s"><img src="http://img.shields.io/badge/trello-%s-blue.svg" /></a> ',
            $card->getUrl(),
            $card->getName()
        );
    }

    /**
     * check if repository mentioned and store mentioned ones
     * @param $comment
     * @return bool
     */
    private function checkIfRepositoriesMentionedInComment($comment)
    {
        $repositoryMentioned = false;
        
        preg_match_all('/\[(.*)\]/U', $comment, $matches);
        if (! empty($matches[1])) {
            foreach ($matches[1] as $match) {
                $info = explode('/', $match);
                switch(count($info)) {
                    case 2: {
                        $repositoryInformation = new RepositoryInformation();
                        $repositoryInformation->setRepositoryName($info[0]);
                        $repositoryInformation->setIssueId($info[1]);
                        $this->mentionedIssues[] = $repositoryInformation;
                        $repositoryMentioned = true;
                    } break;
                    case 1: {
                        if (trim($info[0]) == self::PUSH_TO_ALL_REPOS_PHRASE) {
                            $this->pushToAllRepos = true;
                        } else {
                            $repositoryInformation = new RepositoryInformation();
                            $repositoryInformation->setRepositoryName(trim($info[0]));
                            $this->mentionedRepositories[] = $repositoryInformation->getRepositoryName();
                        }
                        $repositoryMentioned = true;
                    } break;
                    default: //no  default, just skipp
                }
            }
        }

        return $repositoryMentioned;
    }

    /**
     * check if repository is contained fully or partial
     * issueId + repo => fit || repo fit
     * 
     * @param RepositoryInformation $repositoryInformationFromChecklistItemName
     * @return bool
     */
    private function checkIfCurrentRepositoryWasMentioned(RepositoryInformation $repositoryInformationFromChecklistItemName)
    {
        //--_______________________________________________-->
        //issueId + repo fit
        if (in_array($repositoryInformationFromChecklistItemName, $this->mentionedIssues)) {
            return true;
        }

        //--_______________________________________________-->
        //repo fit
        if (in_array($repositoryInformationFromChecklistItemName->getRepositoryName(), $this->mentionedRepositories)) {
            return true;
        }

        return false;
    }

}
