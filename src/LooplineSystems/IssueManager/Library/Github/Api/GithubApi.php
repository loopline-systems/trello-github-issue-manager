<?php
namespace LooplineSystems\IssueManager\Library\Github\Api;

use \Github\Client;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class GithubApi implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @return Client
     */
    public function getGithubClient()
    {
        if (! $this->client) {
            $token = $this->container->getParameter('github')['api']['auth_token'];

            $this->client = new \Github\Client();
            $this->client->authenticate($token, null, \Github\Client::AUTH_HTTP_TOKEN);
        }

        return $this->client;
    }

}
