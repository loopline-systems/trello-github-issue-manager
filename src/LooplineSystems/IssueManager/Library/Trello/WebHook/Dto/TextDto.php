<?php
 
namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Dto;

class TextDto extends AbstractDto
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @param array $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }
    
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
