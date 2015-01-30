<?php
namespace LooplineSystems\IssueManager\Bundle\Github2TrelloBundle\Controller;

use LooplineSystems\IssueManager\Library\Github\IssueReference;
use LooplineSystems\IssueManager\Library\Rest\RestController;
use LooplineSystems\IssueManager\Library\Github\WebHook\EventHandler;
use LooplineSystems\IssueManager\Library\Github\WebHook\GithubWebHook;
use LooplineSystems\IssueManager\Library\Trello\Api\TrelloApiHelper;
use LooplineSystems\IssueManager\Library\Trello\CardReference;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use LooplineSystems\IssueManager\Library\Logger\Logger;

class GithubHooksController extends RestController
{
    const GITHUB_HOOK_LOG = 'github-hooks.log';


    /**
     * <strong>headers:</strong><br>
     * <pre>X-GitHub-Event:    ping|issues|issue_comment</pre><br>
     * <br>
     * <strong>data:</strong> for example, check ./data/webhook-examples/github/issues-opened.json
     *
     * @ApiDoc(
     *  section="Github Hooks",
     *  description="WebHook for incoming GitHub calls"
     *
     * )
     * @Rest\View()
     * @Rest\Route("/github-hook")
     */
    public function postGithubHookAction()
    {
        /** @var GithubWebHook $hook */
        $hook = $this->container->get('issue_manager.github_webhook');
        $hook->loadEvent();

        $eventHandler = new EventHandler();
        $eventHandler->handleEvent($hook->getEvent());


        Logger::log(GithubHooksController::GITHUB_HOOK_LOG, $eventHandler->getLogMessage());

//        // full debug log
//        $data = ['content' => $request->request->all(), 'headers' => $request->headers->all()];
//        Logger::log(self::GITHUB_HOOK_LOG, $data);

        return $eventHandler->getLogMessage();
    }


   /**
    * @ApiDoc(
    *  section="Github Hooks",
    *  description="Dry run, only logs a Github webHook call to logfile: data/logs/github-hooks.log"
    * )
    * @Rest\View()
    * @Rest\Route("/github-hook/log")
    */
    public function postGithubLoggingAction(Request $request)
    {
        $data = [
            'content' => $request->request->all(),
            'headers' => $request->headers->all(),
        ];

        Logger::log(self::GITHUB_HOOK_LOG, $data);

        return $data;
    }


}
