<?php
namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Issues;

class Sender
{
    protected $login;
    protected $avatarUrl;
    protected $gravatarId;
    protected $url;
    protected $htmlUrl;
    protected $followersUrl;
    protected $followingUrl;
    protected $gistsUrl;
    protected $starredUrl;
    protected $subscriptionsUrl;
    protected $organizationsUrl;
    protected $reposUrl;
    protected $eventsUrl;
    protected $receivedEventsUrl;
    protected $type;
    protected $siteAdmin;

    /**
     * @param mixed $avatarUrl
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * @return mixed
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
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
     * @param mixed $followersUrl
     */
    public function setFollowersUrl($followersUrl)
    {
        $this->followersUrl = $followersUrl;
    }

    /**
     * @return mixed
     */
    public function getFollowersUrl()
    {
        return $this->followersUrl;
    }

    /**
     * @param mixed $followingUrl
     */
    public function setFollowingUrl($followingUrl)
    {
        $this->followingUrl = $followingUrl;
    }

    /**
     * @return mixed
     */
    public function getFollowingUrl()
    {
        return $this->followingUrl;
    }

    /**
     * @param mixed $gistsUrl
     */
    public function setGistsUrl($gistsUrl)
    {
        $this->gistsUrl = $gistsUrl;
    }

    /**
     * @return mixed
     */
    public function getGistsUrl()
    {
        return $this->gistsUrl;
    }

    /**
     * @param mixed $gravatarId
     */
    public function setGravatarId($gravatarId)
    {
        $this->gravatarId = $gravatarId;
    }

    /**
     * @return mixed
     */
    public function getGravatarId()
    {
        return $this->gravatarId;
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
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $organizationsUrl
     */
    public function setOrganizationsUrl($organizationsUrl)
    {
        $this->organizationsUrl = $organizationsUrl;
    }

    /**
     * @return mixed
     */
    public function getOrganizationsUrl()
    {
        return $this->organizationsUrl;
    }

    /**
     * @param mixed $receivedEventsUrl
     */
    public function setReceivedEventsUrl($receivedEventsUrl)
    {
        $this->receivedEventsUrl = $receivedEventsUrl;
    }

    /**
     * @return mixed
     */
    public function getReceivedEventsUrl()
    {
        return $this->receivedEventsUrl;
    }

    /**
     * @param mixed $reposUrl
     */
    public function setReposUrl($reposUrl)
    {
        $this->reposUrl = $reposUrl;
    }

    /**
     * @return mixed
     */
    public function getReposUrl()
    {
        return $this->reposUrl;
    }

    /**
     * @param mixed $siteAdmin
     */
    public function setSiteAdmin($siteAdmin)
    {
        $this->siteAdmin = $siteAdmin;
    }

    /**
     * @return mixed
     */
    public function getSiteAdmin()
    {
        return $this->siteAdmin;
    }

    /**
     * @param mixed $starredUrl
     */
    public function setStarredUrl($starredUrl)
    {
        $this->starredUrl = $starredUrl;
    }

    /**
     * @return mixed
     */
    public function getStarredUrl()
    {
        return $this->starredUrl;
    }

    /**
     * @param mixed $subscriptionsUrl
     */
    public function setSubscriptionsUrl($subscriptionsUrl)
    {
        $this->subscriptionsUrl = $subscriptionsUrl;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionsUrl()
    {
        return $this->subscriptionsUrl;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
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



}
