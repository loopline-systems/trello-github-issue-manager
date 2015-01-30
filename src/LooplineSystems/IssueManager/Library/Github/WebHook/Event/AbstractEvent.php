<?php

namespace LooplineSystems\IssueManager\Library\Github\WebHook\Event;

use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Action\ActionInterface;
use LooplineSystems\IssueManager\Library\ObjectPopulator;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\Dao\Repository;
use LooplineSystems\IssueManager\Library\Github\WebHook\GithubConstants;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

abstract class AbstractEvent implements EventInterface, GithubConstants, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @param array $content
     */
    public function setContent(array $content)
    {
        $this->setAction($content);
        $this->setRepository($content);
    }

    /**
     *
     */
    abstract public function triggerAction();

    /**
     * @param ActionInterface $action
     */
    protected function invokeAction(ActionInterface $action = null)
    {
        if ($action) {
            $action->setEvent($this);
            $action->__invoke();
        }
    }

    /**
     * @param array $content
     */
    protected function setAction(array $content)
    {
        if (array_key_exists(self::PARAM_ACTION, $content)) {
            $this->action = $content[self::PARAM_ACTION];
        }
    }

    /**
     * @param array $content
     */
    protected function setRepository(array $content)
    {
        if (array_key_exists(self::PARAM_REPOSITORY, $content)) {
            $this->repository = ObjectPopulator::populate(new Repository(), $content[self::PARAM_REPOSITORY]);
        }
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }


}
