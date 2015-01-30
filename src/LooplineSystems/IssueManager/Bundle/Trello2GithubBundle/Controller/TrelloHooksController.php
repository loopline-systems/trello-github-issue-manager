<?php

namespace LooplineSystems\IssueManager\Bundle\Trello2GithubBundle\Controller;

use LooplineSystems\IssueManager\Library\Logger\Logger;
use LooplineSystems\IssueManager\Library\Rest\RestController;
use LooplineSystems\IssueManager\Library\Trello\WebHook\EventHandler;
use LooplineSystems\IssueManager\Library\Trello\WebHook\TrelloConstants;
use LooplineSystems\IssueManager\Library\Trello\WebHook\TrelloWebHook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class TrelloHooksController extends RestController
{

    const TRELLO_HOOK_LOG = 'trello-hooks.log';

    /**
     * @ApiDoc(
     *  section="Trello Hooks",
     *  description="Webhook for incoming Trello Calls"
     * )
     * @Rest\View(statusCode=200)
     * @Rest\Route("/trello-hook")
     */
    public function postTrelloAction(Request $request)
    {
        $hook = new TrelloWebHook($request, $this->container);


        $eventHandler = new EventHandler();
        $eventHandler->handleEvent($hook->getEvent());

//        // full debug log
//        $data = ['content' => $request->request->all(), 'headers' => $request->headers->all()];
//        Logger::log(self::TRELLO_HOOK_LOG, $data);

        return $eventHandler->getInfo();
    }

    /**
     * This call is needed for Trello to verify the webhook URL (test ping). Simply returns "true"
     *
     * @ApiDoc(
     *  section="Trello Hooks",
     *  description="Head Request, needed to create Webhook on Trello side (trello test ping)"
     * )
     * @Rest\View(statusCode=200)
     * @Rest\Route("/trello-hook")
     */
    public function getTrelloAction()
    {
        return true;
    }


    /**
     * @ApiDoc(
     *  section="Trello Hooks",
     *  description="Dry run, log a Trello hook call to logfile: data/logs/trello-hooks.log"
     * )
     * @Rest\View(statusCode=200)
     * @Rest\Route("/trello-hook/log")
     */
    public function postTrelloLoggingAction(Request $request)
    {
        $data = [
            'content' => $request->request->all(),
            'headers' => $request->headers->all(),
        ];

        Logger::log(self::TRELLO_HOOK_LOG, $data);

        return $data;
    }

    /**
     * This call is needed for Trello to verify the webhook URL (test ping). Simply returns "true"
     *
     * @ApiDoc(
     *  section="Trello Hooks",
     *  description="Head Request, needed to create Webhook on Trello side (trello test ping)"
     * )
     * @Rest\View(statusCode=200)
     * @Rest\Route("/trello-hook/log")
     */
    public function getTrelloLoggingAction()
    {
        return true;
    }

}
