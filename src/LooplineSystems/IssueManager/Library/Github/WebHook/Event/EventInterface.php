<?php

namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Repository;

interface EventInterface
{

    /**
     *
     */
    public function triggerAction();

    /**
     * @return string
     */
    public function getAction();

    /**
     * @return Repository
     */
    public function getRepository();


}
