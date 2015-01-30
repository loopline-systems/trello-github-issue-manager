<?php
 
namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Dto;

class BoardDto extends AbstractDto
{
    /**
     * @var string
     */
    protected $shortLink;

    /**
     * @return string
     */
    public function getShortLink()
    {
        return $this->shortLink;
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
}
