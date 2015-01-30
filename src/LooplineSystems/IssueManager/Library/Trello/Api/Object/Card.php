<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api\Object;

class Card extends AbstractObject
{

    /**
     * Can be found in URL
     * e.g. https://trello.com/c/eQ36EfYP/4-bug
     * => eQ36EfYP
     *
     * @var string
     */
    protected $shortLink;

    protected $badges;
    protected $checkItemStates;
    protected $closed;
    protected $dateLastActivity;

    /**
     * @var string
     */
    protected $desc;
    protected $descData;
    protected $due;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var int
     */
    protected $idChecklists = [];

    /**
     * @var int
     */
    protected $idList;
    protected $idMembers;

    /**
     * @var int
     */
    protected $idShort;

    /**
     * @var int
     */
    protected $idAttachmentCover;
    protected $manualCoverAttachment;
    protected $labels;
    protected $post;

    /**
     * @var string
     */
    protected $shortUrl;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $shortLink
     */
    public function setShortLink($shortLink)
    {
        $this->shortLink = $shortLink;
    }

    /**
     * @return string
     */
    public function getShortLink()
    {
        return $this->shortLink;
    }

    /**
     * @param mixed $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
    }

    /**
     * @return mixed
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param mixed $checkItemStates
     */
    public function setCheckItemStates($checkItemStates)
    {
        $this->checkItemStates = $checkItemStates;
    }

    /**
     * @return mixed
     */
    public function getCheckItemStates()
    {
        return $this->checkItemStates;
    }

    /**
     * @param mixed $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    /**
     * @return mixed
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * @param mixed $dateLastActivity
     */
    public function setDateLastActivity($dateLastActivity)
    {
        $this->dateLastActivity = $dateLastActivity;
    }

    /**
     * @return mixed
     */
    public function getDateLastActivity()
    {
        return $this->dateLastActivity;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $descData
     */
    public function setDescData($descData)
    {
        $this->descData = $descData;
    }

    /**
     * @return mixed
     */
    public function getDescData()
    {
        return $this->descData;
    }

    /**
     * @param mixed $due
     */
    public function setDue($due)
    {
        $this->due = $due;
    }

    /**
     * @return mixed
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $idAttachmentCover
     */
    public function setIdAttachmentCover($idAttachmentCover)
    {
        $this->idAttachmentCover = $idAttachmentCover;
    }

    /**
     * @return mixed
     */
    public function getIdAttachmentCover()
    {
        return $this->idAttachmentCover;
    }

    /**
     * @param mixed $idChecklists
     */
    public function setIdChecklists($idChecklists)
    {
        $this->idChecklists = $idChecklists;
    }

    /**
     * @return mixed
     */
    public function getIdChecklists()
    {
        return $this->idChecklists;
    }

    /**
     * @param mixed $idList
     */
    public function setIdList($idList)
    {
        $this->idList = $idList;
    }

    /**
     * @return mixed
     */
    public function getIdList()
    {
        return $this->idList;
    }

    /**
     * @param mixed $idMembers
     */
    public function setIdMembers($idMembers)
    {
        $this->idMembers = $idMembers;
    }

    /**
     * @return mixed
     */
    public function getIdMembers()
    {
        return $this->idMembers;
    }

    /**
     * @param mixed $idShort
     */
    public function setIdShort($idShort)
    {
        $this->idShort = $idShort;
    }

    /**
     * @return mixed
     */
    public function getIdShort()
    {
        return $this->idShort;
    }

    /**
     * @param mixed $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param mixed $manualCoverAttachment
     */
    public function setManualCoverAttachment($manualCoverAttachment)
    {
        $this->manualCoverAttachment = $manualCoverAttachment;
    }

    /**
     * @return mixed
     */
    public function getManualCoverAttachment()
    {
        return $this->manualCoverAttachment;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $shortUrl
     */
    public function setShortUrl($shortUrl)
    {
        $this->shortUrl = $shortUrl;
    }

    /**
     * @return mixed
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
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
