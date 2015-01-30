<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\IssueComment;

class Comment
{
    private $url;
    private $html_url;
    private $issue_url;
    private $id;
    private $user;
    private $created_at;
    private $updated_at;
    private $body;

    /**
     * @param mixed $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $created_at
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $html_url
     * @return $this
     */
    public function setHtmlUrl($html_url)
    {
        $this->html_url = $html_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHtmlUrl()
    {
        return $this->html_url;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $issue_url
     * @return $this
     */
    public function setIssueUrl($issue_url)
    {
        $this->issue_url = $issue_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssueUrl()
    {
        return $this->issue_url;
    }

    /**
     * @param mixed $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
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
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
 
}
