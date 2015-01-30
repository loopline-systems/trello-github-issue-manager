<?php
namespace LooplineSystems\IssueManager\Library\Trello\Api;

use LooplineSystems\IssueManager\Library\Trello\Api\Object\AbstractObject;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\AbstractRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class AbstractTrelloApi implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param AbstractRequest $request
     * @return AbstractObject|null
     */
    protected function getResponse(AbstractRequest $request)
    {
        $curl = new Curl($this);
        $object = $curl->getResponse($request);

        return $object;
    }

    /**
     * @return string
     */
    public function getApplicationKey()
    {
        return $this->container->getParameter('trello')['api']['application_key'];
    }

    /**
     * @return string
     */
    public function getAuthToken()
    {
        return $this->container->getParameter('trello')['api']['auth_token'];
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->container->getParameter('trello')['api']['base_url'];
    }

}
