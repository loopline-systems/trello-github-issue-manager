<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao;

class Repository
{
    protected $id;
    protected $name;
    protected $fullName;
    protected $owner;
    protected $private = false;
    protected $htmlUrl;
    protected $description;
    protected $fork = false;
    protected $url;
    protected $forksUrl;
    protected $keysUrl;
    protected $collaboratorsUrl;
    protected $teamsUrl;
    protected $hooksUrl;
    protected $issueEventsUrl;
    protected $eventsUrl;
    protected $assigneesUrl;
    protected $branchesUrl;
    protected $tagsUrl;
    protected $blobsUrl;
    protected $gitTagsUrl;
    protected $gitRefsUrl;
    protected $treesUrl;
    protected $statusesUrl;
    protected $languagesUrl;
    protected $stargazersUrl;
    protected $contributorsUrl;
    protected $subscribersUrl;
    protected $subscriptionUrl;
    protected $commitsUrl;
    protected $gitCommitsUrl;
    protected $commentsUrl;
    protected $issueCommentUrl;
    protected $contentsUrl;
    protected $compareUrl;
    protected $mergesUrl;
    protected $archiveUrl;
    protected $downloadsUrl;
    protected $issuesUrl;
    protected $pullsUrl;
    protected $milestonesUrl;
    protected $notificationsUrl;
    protected $labelsUrl;
    protected $releasesUrl;
    protected $createdAt;
    protected $updatedAt;
    protected $pushedAt;
    protected $gitUrl;
    protected $sshUrl;
    protected $cloneUrl;
    protected $svnUrl;
    protected $homepage;
    protected $size;
    protected $stargazersCount = 0;
    protected $watchersCount = 0;
    protected $hasIssues = false;
    protected $hasDownloads = false;
    protected $hasWiki = false;
    protected $forksCount = 0;
    protected $mirrorUrl;
    protected $openIssuesCount = 0;
    protected $forks = 0;
    protected $openIssues = 0;
    protected $watchers = 0;
    protected $defaultBranch;
    protected $masterBranch;

    /**
     * @param mixed $archiveUrl
     */
    public function setArchiveUrl($archiveUrl)
    {
        $this->archiveUrl = $archiveUrl;
    }

    /**
     * @return mixed
     */
    public function getArchiveUrl()
    {
        return $this->archiveUrl;
    }

    /**
     * @param mixed $assigneesUrl
     */
    public function setAssigneesUrl($assigneesUrl)
    {
        $this->assigneesUrl = $assigneesUrl;
    }

    /**
     * @return mixed
     */
    public function getAssigneesUrl()
    {
        return $this->assigneesUrl;
    }

    /**
     * @param mixed $blobsUrl
     */
    public function setBlobsUrl($blobsUrl)
    {
        $this->blobsUrl = $blobsUrl;
    }

    /**
     * @return mixed
     */
    public function getBlobsUrl()
    {
        return $this->blobsUrl;
    }

    /**
     * @param mixed $branchesUrl
     */
    public function setBranchesUrl($branchesUrl)
    {
        $this->branchesUrl = $branchesUrl;
    }

    /**
     * @return mixed
     */
    public function getBranchesUrl()
    {
        return $this->branchesUrl;
    }

    /**
     * @param mixed $cloneUrl
     */
    public function setCloneUrl($cloneUrl)
    {
        $this->cloneUrl = $cloneUrl;
    }

    /**
     * @return mixed
     */
    public function getCloneUrl()
    {
        return $this->cloneUrl;
    }

    /**
     * @param mixed $collaboratorsUrl
     */
    public function setCollaboratorsUrl($collaboratorsUrl)
    {
        $this->collaboratorsUrl = $collaboratorsUrl;
    }

    /**
     * @return mixed
     */
    public function getCollaboratorsUrl()
    {
        return $this->collaboratorsUrl;
    }

    /**
     * @param mixed $commentsUrl
     */
    public function setCommentsUrl($commentsUrl)
    {
        $this->commentsUrl = $commentsUrl;
    }

    /**
     * @return mixed
     */
    public function getCommentsUrl()
    {
        return $this->commentsUrl;
    }

    /**
     * @param mixed $commitsUrl
     */
    public function setCommitsUrl($commitsUrl)
    {
        $this->commitsUrl = $commitsUrl;
    }

    /**
     * @return mixed
     */
    public function getCommitsUrl()
    {
        return $this->commitsUrl;
    }

    /**
     * @param mixed $compareUrl
     */
    public function setCompareUrl($compareUrl)
    {
        $this->compareUrl = $compareUrl;
    }

    /**
     * @return mixed
     */
    public function getCompareUrl()
    {
        return $this->compareUrl;
    }

    /**
     * @param mixed $contentsUrl
     */
    public function setContentsUrl($contentsUrl)
    {
        $this->contentsUrl = $contentsUrl;
    }

    /**
     * @return mixed
     */
    public function getContentsUrl()
    {
        return $this->contentsUrl;
    }

    /**
     * @param mixed $contributorsUrl
     */
    public function setContributorsUrl($contributorsUrl)
    {
        $this->contributorsUrl = $contributorsUrl;
    }

    /**
     * @return mixed
     */
    public function getContributorsUrl()
    {
        return $this->contributorsUrl;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $defaultBranch
     */
    public function setDefaultBranch($defaultBranch)
    {
        $this->defaultBranch = $defaultBranch;
    }

    /**
     * @return mixed
     */
    public function getDefaultBranch()
    {
        return $this->defaultBranch;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $downloadsUrl
     */
    public function setDownloadsUrl($downloadsUrl)
    {
        $this->downloadsUrl = $downloadsUrl;
    }

    /**
     * @return mixed
     */
    public function getDownloadsUrl()
    {
        return $this->downloadsUrl;
    }

    /**
     * @param mixed $eventsUrl
     */
    public function setEventsUrl($eventsUrl)
    {
        $this->eventsUrl = $eventsUrl;
    }

    /**
     * @return mixed
     */
    public function getEventsUrl()
    {
        return $this->eventsUrl;
    }

    /**
     * @param boolean $fork
     */
    public function setFork($fork)
    {
        $this->fork = $fork;
    }

    /**
     * @return boolean
     */
    public function getFork()
    {
        return $this->fork;
    }

    /**
     * @param int $forks
     */
    public function setForks($forks)
    {
        $this->forks = $forks;
    }

    /**
     * @return int
     */
    public function getForks()
    {
        return $this->forks;
    }

    /**
     * @param int $forksCount
     */
    public function setForksCount($forksCount)
    {
        $this->forksCount = $forksCount;
    }

    /**
     * @return int
     */
    public function getForksCount()
    {
        return $this->forksCount;
    }

    /**
     * @param mixed $forksUrl
     */
    public function setForksUrl($forksUrl)
    {
        $this->forksUrl = $forksUrl;
    }

    /**
     * @return mixed
     */
    public function getForksUrl()
    {
        return $this->forksUrl;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $gitCommitsUrl
     */
    public function setGitCommitsUrl($gitCommitsUrl)
    {
        $this->gitCommitsUrl = $gitCommitsUrl;
    }

    /**
     * @return mixed
     */
    public function getGitCommitsUrl()
    {
        return $this->gitCommitsUrl;
    }

    /**
     * @param mixed $gitRefsUrl
     */
    public function setGitRefsUrl($gitRefsUrl)
    {
        $this->gitRefsUrl = $gitRefsUrl;
    }

    /**
     * @return mixed
     */
    public function getGitRefsUrl()
    {
        return $this->gitRefsUrl;
    }

    /**
     * @param mixed $gitTagsUrl
     */
    public function setGitTagsUrl($gitTagsUrl)
    {
        $this->gitTagsUrl = $gitTagsUrl;
    }

    /**
     * @return mixed
     */
    public function getGitTagsUrl()
    {
        return $this->gitTagsUrl;
    }

    /**
     * @param mixed $gitUrl
     */
    public function setGitUrl($gitUrl)
    {
        $this->gitUrl = $gitUrl;
    }

    /**
     * @return mixed
     */
    public function getGitUrl()
    {
        return $this->gitUrl;
    }

    /**
     * @param boolean $hasDownloads
     */
    public function setHasDownloads($hasDownloads)
    {
        $this->hasDownloads = $hasDownloads;
    }

    /**
     * @return boolean
     */
    public function getHasDownloads()
    {
        return $this->hasDownloads;
    }

    /**
     * @param boolean $hasIssues
     */
    public function setHasIssues($hasIssues)
    {
        $this->hasIssues = $hasIssues;
    }

    /**
     * @return boolean
     */
    public function getHasIssues()
    {
        return $this->hasIssues;
    }

    /**
     * @param boolean $hasWiki
     */
    public function setHasWiki($hasWiki)
    {
        $this->hasWiki = $hasWiki;
    }

    /**
     * @return boolean
     */
    public function getHasWiki()
    {
        return $this->hasWiki;
    }

    /**
     * @param mixed $homepage
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * @return mixed
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @param mixed $hooksUrl
     */
    public function setHooksUrl($hooksUrl)
    {
        $this->hooksUrl = $hooksUrl;
    }

    /**
     * @return mixed
     */
    public function getHooksUrl()
    {
        return $this->hooksUrl;
    }

    /**
     * @param mixed $htmlUrl
     */
    public function setHtmlUrl($htmlUrl)
    {
        $this->htmlUrl = $htmlUrl;
    }

    /**
     * @return mixed
     */
    public function getHtmlUrl()
    {
        return $this->htmlUrl;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $issueCommentUrl
     */
    public function setIssueCommentUrl($issueCommentUrl)
    {
        $this->issueCommentUrl = $issueCommentUrl;
    }

    /**
     * @return mixed
     */
    public function getIssueCommentUrl()
    {
        return $this->issueCommentUrl;
    }

    /**
     * @param mixed $issueEventsUrl
     */
    public function setIssueEventsUrl($issueEventsUrl)
    {
        $this->issueEventsUrl = $issueEventsUrl;
    }

    /**
     * @return mixed
     */
    public function getIssueEventsUrl()
    {
        return $this->issueEventsUrl;
    }

    /**
     * @param mixed $issuesUrl
     */
    public function setIssuesUrl($issuesUrl)
    {
        $this->issuesUrl = $issuesUrl;
    }

    /**
     * @return mixed
     */
    public function getIssuesUrl()
    {
        return $this->issuesUrl;
    }

    /**
     * @param mixed $keysUrl
     */
    public function setKeysUrl($keysUrl)
    {
        $this->keysUrl = $keysUrl;
    }

    /**
     * @return mixed
     */
    public function getKeysUrl()
    {
        return $this->keysUrl;
    }

    /**
     * @param mixed $labelsUrl
     */
    public function setLabelsUrl($labelsUrl)
    {
        $this->labelsUrl = $labelsUrl;
    }

    /**
     * @return mixed
     */
    public function getLabelsUrl()
    {
        return $this->labelsUrl;
    }

    /**
     * @param mixed $languagesUrl
     */
    public function setLanguagesUrl($languagesUrl)
    {
        $this->languagesUrl = $languagesUrl;
    }

    /**
     * @return mixed
     */
    public function getLanguagesUrl()
    {
        return $this->languagesUrl;
    }

    /**
     * @param mixed $masterBranch
     */
    public function setMasterBranch($masterBranch)
    {
        $this->masterBranch = $masterBranch;
    }

    /**
     * @return mixed
     */
    public function getMasterBranch()
    {
        return $this->masterBranch;
    }

    /**
     * @param mixed $mergesUrl
     */
    public function setMergesUrl($mergesUrl)
    {
        $this->mergesUrl = $mergesUrl;
    }

    /**
     * @return mixed
     */
    public function getMergesUrl()
    {
        return $this->mergesUrl;
    }

    /**
     * @param mixed $milestonesUrl
     */
    public function setMilestonesUrl($milestonesUrl)
    {
        $this->milestonesUrl = $milestonesUrl;
    }

    /**
     * @return mixed
     */
    public function getMilestonesUrl()
    {
        return $this->milestonesUrl;
    }

    /**
     * @param mixed $mirrorUrl
     */
    public function setMirrorUrl($mirrorUrl)
    {
        $this->mirrorUrl = $mirrorUrl;
    }

    /**
     * @return mixed
     */
    public function getMirrorUrl()
    {
        return $this->mirrorUrl;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $notificationsUrl
     */
    public function setNotificationsUrl($notificationsUrl)
    {
        $this->notificationsUrl = $notificationsUrl;
    }

    /**
     * @return mixed
     */
    public function getNotificationsUrl()
    {
        return $this->notificationsUrl;
    }

    /**
     * @param int $openIssues
     */
    public function setOpenIssues($openIssues)
    {
        $this->openIssues = $openIssues;
    }

    /**
     * @return int
     */
    public function getOpenIssues()
    {
        return $this->openIssues;
    }

    /**
     * @param int $openIssuesCount
     */
    public function setOpenIssuesCount($openIssuesCount)
    {
        $this->openIssuesCount = $openIssuesCount;
    }

    /**
     * @return int
     */
    public function getOpenIssuesCount()
    {
        return $this->openIssuesCount;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param boolean $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * @return boolean
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param mixed $pullsUrl
     */
    public function setPullsUrl($pullsUrl)
    {
        $this->pullsUrl = $pullsUrl;
    }

    /**
     * @return mixed
     */
    public function getPullsUrl()
    {
        return $this->pullsUrl;
    }

    /**
     * @param mixed $pushedAt
     */
    public function setPushedAt($pushedAt)
    {
        $this->pushedAt = $pushedAt;
    }

    /**
     * @return mixed
     */
    public function getPushedAt()
    {
        return $this->pushedAt;
    }

    /**
     * @param mixed $releasesUrl
     */
    public function setReleasesUrl($releasesUrl)
    {
        $this->releasesUrl = $releasesUrl;
    }

    /**
     * @return mixed
     */
    public function getReleasesUrl()
    {
        return $this->releasesUrl;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $sshUrl
     */
    public function setSshUrl($sshUrl)
    {
        $this->sshUrl = $sshUrl;
    }

    /**
     * @return mixed
     */
    public function getSshUrl()
    {
        return $this->sshUrl;
    }

    /**
     * @param int $stargazersCount
     */
    public function setStargazersCount($stargazersCount)
    {
        $this->stargazersCount = $stargazersCount;
    }

    /**
     * @return int
     */
    public function getStargazersCount()
    {
        return $this->stargazersCount;
    }

    /**
     * @param mixed $stargazersUrl
     */
    public function setStargazersUrl($stargazersUrl)
    {
        $this->stargazersUrl = $stargazersUrl;
    }

    /**
     * @return mixed
     */
    public function getStargazersUrl()
    {
        return $this->stargazersUrl;
    }

    /**
     * @param mixed $statusesUrl
     */
    public function setStatusesUrl($statusesUrl)
    {
        $this->statusesUrl = $statusesUrl;
    }

    /**
     * @return mixed
     */
    public function getStatusesUrl()
    {
        return $this->statusesUrl;
    }

    /**
     * @param mixed $subscribersUrl
     */
    public function setSubscribersUrl($subscribersUrl)
    {
        $this->subscribersUrl = $subscribersUrl;
    }

    /**
     * @return mixed
     */
    public function getSubscribersUrl()
    {
        return $this->subscribersUrl;
    }

    /**
     * @param mixed $subscriptionUrl
     */
    public function setSubscriptionUrl($subscriptionUrl)
    {
        $this->subscriptionUrl = $subscriptionUrl;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionUrl()
    {
        return $this->subscriptionUrl;
    }

    /**
     * @param mixed $svnUrl
     */
    public function setSvnUrl($svnUrl)
    {
        $this->svnUrl = $svnUrl;
    }

    /**
     * @return mixed
     */
    public function getSvnUrl()
    {
        return $this->svnUrl;
    }

    /**
     * @param mixed $tagsUrl
     */
    public function setTagsUrl($tagsUrl)
    {
        $this->tagsUrl = $tagsUrl;
    }

    /**
     * @return mixed
     */
    public function getTagsUrl()
    {
        return $this->tagsUrl;
    }

    /**
     * @param mixed $teamsUrl
     */
    public function setTeamsUrl($teamsUrl)
    {
        $this->teamsUrl = $teamsUrl;
    }

    /**
     * @return mixed
     */
    public function getTeamsUrl()
    {
        return $this->teamsUrl;
    }

    /**
     * @param mixed $treesUrl
     */
    public function setTreesUrl($treesUrl)
    {
        $this->treesUrl = $treesUrl;
    }

    /**
     * @return mixed
     */
    public function getTreesUrl()
    {
        return $this->treesUrl;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param int $watchers
     */
    public function setWatchers($watchers)
    {
        $this->watchers = $watchers;
    }

    /**
     * @return int
     */
    public function getWatchers()
    {
        return $this->watchers;
    }

    /**
     * @param int $watchersCount
     */
    public function setWatchersCount($watchersCount)
    {
        $this->watchersCount = $watchersCount;
    }

    /**
     * @return int
     */
    public function getWatchersCount()
    {
        return $this->watchersCount;
    }


}
