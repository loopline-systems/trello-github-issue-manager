<?php
namespace LooplineSystems\IssueManager\Library\Trello\Api\Request;


abstract class AbstractRequest
{

    protected $object;


    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $contentType;

    /**
     * @var string
     */
    protected $dataString = '';

    /**
     * @var string
     */
    protected $method = 'GET';

    /**
     * @var
     */
    protected $headers = [];


    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url . $this->getRelativeUrl();
    }

    /**
     * @return string
     */
    abstract public function getRelativeUrl();


    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getDataString()
    {
        $query = http_build_query($this->getData(), '', '&');

        return $query;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

} 