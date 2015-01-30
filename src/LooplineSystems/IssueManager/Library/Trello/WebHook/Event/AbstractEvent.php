<?php

namespace LooplineSystems\IssueManager\Library\Trello\WebHook\Event;

use LooplineSystems\IssueManager\Library\Github\Api\GithubApi;
use LooplineSystems\IssueManager\Library\Trello\Api\TrelloApi;
use LooplineSystems\IssueManager\Library\Trello\Api\TrelloApiHelper;
use LooplineSystems\IssueManager\Library\Trello\WebHook\TrelloConstants;
use LooplineSystems\IssueManager\Library\Trello\WebHook\TrelloWebHook;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractEvent implements EventInterface, TrelloConstants
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var TrelloWebHook
     */
    protected $trelloWebHook;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var TrelloApi
     */
    protected $trelloApi;

    /**
     * @var TrelloApiHelper
     */
    protected $trelloApiHelper;

    /**
     * @var \Github\Client
     */
    protected $githubClient;

    /**
     * @var string
     */
    protected $githubUserName;


    /**
     * @param TrelloWebHook $trelloWebHook
     * @param ContainerInterface $container
     */
    public function __construct(TrelloWebHook $trelloWebHook, ContainerInterface $container)
    {
        $this->container = $container;
        $this->trelloWebHook = $trelloWebHook;

        $this->init();
    }

    protected function init()
    {
        $this->type = $this->trelloWebHook->getType();

        $this->trelloApi = $this->container->get('issue_manager.trello_api.api');
        $this->trelloApiHelper = $this->container->get('issue_manager.trello_api.api_helper');

        $this->githubClient = $this->container->get('issue_manager.github_api')->getGithubClient();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return \LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist|null
     */
    protected function loadCheckListByCard()
    {
        $cardDto = $this->trelloWebHook->getDtoContainer()->getCardDto();

        return
            $this->trelloApiHelper->getChecklistFromCardShortLink(
                $cardDto->getShortLink()
            );
    }

    /**
     * @return \LooplineSystems\IssueManager\Library\Trello\Api\Object\Card|null
     */
    protected function loadCard()
    {
        $cardDto = $this->trelloWebHook->getDtoContainer()->getCardDto();

        return
            $this->trelloApi->getCardByShortLink(
                $cardDto->getShortLink()
            );
    }

    /**
     * @return mixed
     */
    protected function getGithubUserName()
    {
        if (! $this->githubUserName) {
            $this->githubUserName = $this->container->getParameter('github')['api']['user_name'];
        }
        return $this->githubUserName;
    }


}
