<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Issues;

class Issue
{
    protected $url;
    protected $labelsUrl;
    protected $commentsUrl;
    protected $eventsUrl;
    protected $htmlUrl;
    protected $id;
    protected $number;
    protected $title;
    protected $user;
    protected $labels = [];
    protected $state;
    protected $assignee;
    protected $milestone;
    protected $comments;
    protected $createdAt;
    protected $updatedAt;
    protected $closedAt;
    protected $pullRequest;
    protected $body;

    /**
     * @param mixed $assignee
     */
    public function setAssignee($assignee)
    {
        $this->assignee = $assignee;
    }

    /**
     * @return mixed
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $closedAt
     */
    public function setClosedAt($closedAt)
    {
        $this->closedAt = $closedAt;
    }

    /**
     * @return mixed
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
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
     * @param array $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
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
     * @param mixed $milestone
     */
    public function setMilestone($milestone)
    {
        $this->milestone = $milestone;
    }

    /**
     * @return mixed
     */
    public function getMilestone()
    {
        return $this->milestone;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $pullRequest
     */
    public function setPullRequest($pullRequest)
    {
        $this->pullRequest = $pullRequest;
    }

    /**
     * @return mixed
     */
    public function getPullRequest()
    {
        return $this->pullRequest;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }



}
