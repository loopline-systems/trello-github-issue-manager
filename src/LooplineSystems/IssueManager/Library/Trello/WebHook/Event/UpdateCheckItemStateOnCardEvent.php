<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

use LooplineSystems\IssueManager\Library\Github\Api\GithubApi;
use LooplineSystems\IssueManager\Library\Github\Api\Object\Issue;
use LooplineSystems\IssueManager\Library\Github\IssueReference;
use LooplineSystems\IssueManager\Library\Github\RepositoryInformation;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;

class UpdateCheckItemStateOnCardEvent extends AbstractEvent
{

    /**
     * Close/Re-open Github issue when checklistItem changed on Trello
     */
    public function trigger()
    {
        $checkItemDto = $this->trelloWebHook->getDtoContainer()->getCheckItemDto();
        $repoInfo = IssueReference::getRepositoryInformationFromUrl($checkItemDto->getName());
        if (! $repoInfo) {
            return;
        }

        $githubIssueStateNew = ($checkItemDto->getState() == ChecklistItem::STATUS_COMPLETE)
            ? Issue::STATE_CLOSED
            : Issue::STATE_OPEN;

        $issue = $this->getIssueFromGithub($repoInfo);
        if ($issue && $issue['state'] != $githubIssueStateNew) {
            $this->updateIssue($repoInfo, $githubIssueStateNew);
        }

    }

    /**
     * @param RepositoryInformation $repoInfo
     * @param string $githubIssueStateNew
     */
    protected function updateIssue(RepositoryInformation $repoInfo, $githubIssueStateNew)
    {
        $this->githubClient->issues()->update(
            $this->getGithubUserName(),
            $repoInfo->getRepositoryName(),
            $repoInfo->getIssueId(),
            array('state' => $githubIssueStateNew)
        );
    }

    /**
     * @param RepositoryInformation $repoInfo
     * @return null|array
     */
    protected function getIssueFromGithub(RepositoryInformation $repoInfo)
    {
        $issue = null;

        try {
            /** @var  $issue */
            $issue = $this->githubClient->issues()->show(
                $this->getGithubUserName(),             //username
                $repoInfo->getRepositoryName(),   //repo
                $repoInfo->getIssueId()           //issue
            );
        } catch (\Github\Exception\RuntimeException $runtimeException) {
            // dont care
        }

        return $issue;
    }

}
