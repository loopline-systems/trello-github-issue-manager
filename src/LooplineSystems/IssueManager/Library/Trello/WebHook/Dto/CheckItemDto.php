<?php
 
namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Dto;

class CheckItemDto extends AbstractDto
{
    /**
     * @var string
     */
    protected $state;

    /**
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

}
