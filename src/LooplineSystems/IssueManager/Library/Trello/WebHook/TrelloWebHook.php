<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook;

use LooplineSystems\IssueManager\Library\Trello\WebHook\Event\EventInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * HEADERS:
 *   x-trello-webhook  Signature, needs verification
 * @see https://trello.com/docs/gettingstarted/webhooks.html
 *
 */
class TrelloWebHook implements TrelloConstants
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var string
     */
    protected $signature;

    /**
     * @var array
     */
    protected $content;

    /**
     * @var array
     */
    protected $action;

    /**
     * @var array
     */
    protected $model;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var DtoContainer
     */
    protected $dtoContainer;

    /**
     * @var EventInterface
     */
    protected $event;

    /**
     * @param Request $request
     * @param ContainerInterface $container
     * @throws \Exception
     */
    public function __construct(Request $request, ContainerInterface $container)
    {
        $this->container = $container;

        $this->signature = $request->headers->get(self::HEADER_X_TRELLO_WEBHOOK);
        $this->content = $request->request->all();

        $this->action = $this->content[self::PARAM_ACTION];
        $this->model = $this->content[self::PARAM_MODEL];
        
        $this->type = $this->action[self::PARAM_TYPE];
        $this->dtoContainer = new DtoContainer();

        $this->hydrateObjectsFromData($this->action[self::PARAM_DATA]);
        $this->loadEvent();
    }

    /**
     * @param $data
     * @throws \Exception
     */
    private function hydrateObjectsFromData($data)
    {
        foreach ($data as $name => $payload) {
            $dtoClassName = ucfirst($name) . 'Dto';
            $dtoClass = '\LooplineSystems\IssueManager\Library\Trello\WebHook\Dto\\' . $dtoClassName;

            if (! class_exists($dtoClass)) {
                throw new \Exception('Unknown Dto: "' . $dtoClass . '"!');
            }
   
            $this->dtoContainer[$name] = new $dtoClass($payload);
        }
    }
    
    /**
     * @throws \Exception
     * @returns EventInterface
     */
    public function loadEvent()
    {
        $eventClassName = ucfirst($this->type) . 'Event';
        $eventClass = '\LooplineSystems\IssueManager\Library\Trello\WebHook\Event\\' . $eventClassName;

        if (! class_exists($eventClass)) {
            throw new \Exception('Unknown WebHook type: "' . $this->type . '"!');
        }

        $this->event = new $eventClass($this, $this->container);
    }

    /**
     * @param array $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return array
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param array $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param array $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return array
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $signature
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $event
     * @return $this
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param \LooplineSystems\IssueManager\Library\Trello\WebHook\DtoContainer $dtoContainer
     * @return $this
     */
    public function setDtoContainer($dtoContainer)
    {
        $this->dtoContainer = $dtoContainer;
        return $this;
    }

    /**
     * @return \LooplineSystems\IssueManager\Library\Trello\WebHook\DtoContainer
     */
    public function getDtoContainer()
    {
        return $this->dtoContainer;
    }

}
