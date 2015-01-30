<?php

namespace LooplineSystems\IssueManager\Library\Github\WebHook;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Request;
use LooplineSystems\IssueManager\Library\Github\WebHook\Event\EventInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 *
 * HEADERS:
 *   X-GitHub-Event     The event type that was triggered.
 *   X-GitHub-Delivery  A guid to identify the payload and event being sent.
 *   X-Hub-Signature    The value of this header is computed as the HMAC hex digest of the body, using the secret config option as the key.
 *
 * @see: https://developer.github.com/v3/repos/hooks/#receiving-webhooks
 *
 */
class GithubWebHook implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    const HEADER_X_GITHUB_EVENT = 'X-GitHub-Event';
    const HEADER_X_GITHUB_DELIVERY = 'X-GitHub-Delivery';
    const HEADER_X_GITHUB_SIGNATURE = 'X-Hub-Signature';


    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string
     */
    protected $deliveryGuid;

    /**
     * @var
     */
    protected $signature;

    /**
     * @var
     */
    protected $content;

    /**
     * @var EventInterface
     */
    protected $event;


    /**
     * @param RequestStack $requestStack
     */
    public function setRequest(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     *
     */
    public function init()
    {
        $this->eventName = $this->request->headers->get(self::HEADER_X_GITHUB_EVENT);
        $this->deliveryGuid = $this->request->headers->get(self::HEADER_X_GITHUB_DELIVERY);
        $this->signature = $this->request->headers->get(self::HEADER_X_GITHUB_SIGNATURE);
        $this->content = $this->request->request->all();
    }

    public function loadEvent()
    {
        $this->init();

        $eventServiceName = 'issue_manager.github_webhook.event_' . strtolower($this->eventName);
        $this->event = $this->container->get($eventServiceName);
        $this->event->setContent($this->content);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $data = [
            'eventName' => $this->eventName,
            'delivery' => $this->deliveryGuid,
            'signature' => $this->signature,
            'content' => $this->content,
        ];

        return json_encode($data);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getDeliveryGuid()
    {
        return $this->deliveryGuid;
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return \LooplineSystems\IssueManager\Library\Github\WebHook\Event\EventInterface
     */
    public function getEvent()
    {
        return $this->event;
    }

}
