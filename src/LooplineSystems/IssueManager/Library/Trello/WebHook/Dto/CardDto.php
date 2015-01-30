<?php
 
namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Dto;

class CardDto extends AbstractDto
{
    /**
     * @var string
     */
    protected $idShort;

    /**
     * @var string
     */
    protected $shortLink;

    /**
     * @param string $idShort
     * @return $this
     */
    public function setIdShort($idShort)
    {
        $this->idShort = $idShort;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdShort()
    {
        return $this->idShort;
    }

    /**
     * @param string $shortLink
     * @return $this
     */
    public function setShortLink($shortLink)
    {
        $this->shortLink = $shortLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortLink()
    {
        return $this->shortLink;
    }

}
