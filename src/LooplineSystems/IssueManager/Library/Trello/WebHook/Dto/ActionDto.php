<?php
 
namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Dto;

class ActionDto extends AbstractDto
{
    /**
     * @var string
     */
    protected $text;
    
    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
