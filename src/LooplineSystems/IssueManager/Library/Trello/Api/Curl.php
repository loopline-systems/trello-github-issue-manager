<?php

namespace LooplineSystems\IssueManager\Library\Trello\Api;


use LooplineSystems\IssueManager\Library\ObjectPopulator;
use LooplineSystems\IssueManager\Library\Trello\Api\Request\AbstractRequest;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\AbstractObject;

class Curl
{
    /**
     * @var TrelloApi
     */
    protected $api;

    /**
     * @param TrelloApi $api
     */
    public function __construct(TrelloApi $api)
    {
        $this->api = $api;
    }

    /**
     * @param AbstractRequest $request
     * @return AbstractObject|null
     */
    public function getResponse(AbstractRequest $request)
    {
        $url = $this->createUrl($request);
        $curlHandler = curl_init($url);

        $this->finalize($curlHandler, $request);

        return $this->execute($curlHandler, $request);
    }

    /**
     * @param AbstractRequest $request
     * @return string
     * @throws \Exception
     */
    protected function createUrl(AbstractRequest $request)
    {
        if ($request->getUrl() == null) {
            throw new \Exception('No URL!');
        }

        $url = $this->api->getBaseUrl() . $request->getUrl();

        $query = http_build_query([
            'key' => $this->api->getApplicationKey(),
            'token' => $this->api->getAuthToken(),
        ]);
        
        $url .= '?' . $query;

        return $url;
    }

    /**
     * @param $curlHandler
     * @param AbstractRequest $request
     */
    protected function finalize($curlHandler, AbstractRequest $request)
    {
        curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $request->getDataString());
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $request->getHeaders());
    }

    /**
     * TODO: currently, only happy case :)
     *
     * @param $curlHandler
     * @param AbstractRequest $request
     * @return bool|AbstractObject
     */
    protected function execute($curlHandler, AbstractRequest $request)
    {
        $result = curl_exec($curlHandler);
        $curlInfo = curl_getinfo($curlHandler);
//        $lastHttpCode = $curlInfo['http_code'];
        curl_close($curlHandler);

//        // TODO: remove this debug output
//        echo PHP_EOL.'<hr /><pre>'; \Doctrine\Common\Util\Debug::dump($request); echo '</pre><hr />'.PHP_EOL.__CLASS__.PHP_EOL.__FILE__ . ':'.__LINE__.PHP_EOL.PHP_EOL;
//        echo PHP_EOL.'<hr /><pre>'; \Doctrine\Common\Util\Debug::dump($curlInfo); echo '</pre><hr />'.PHP_EOL.__CLASS__.PHP_EOL.__FILE__ . ':'.__LINE__.PHP_EOL.PHP_EOL;

        if ($result) {
            $responseData = json_decode($result, true);

            $object = ObjectPopulator::populate($request->getObject(), $responseData);

            return $object;
        }

        return false;
    }

} 
