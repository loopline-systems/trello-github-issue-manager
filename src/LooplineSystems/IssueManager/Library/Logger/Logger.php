<?php

namespace LooplineSystems\IssueManager\Library\Logger;

class Logger
{
    /**
     * @var
     */
    protected $fileName;


    protected static function getFile()
    {
        return __DIR__;
    }

    /**
     * @param string $fileName
     * @param mixed $content
     */
    public static function log($fileName, $content)
    {
        $file = static::getPath() . $fileName;

        $logLine = '[' . date('Y-m-d H:i:s') . '] ';

        if (is_string($content)) {
            $logLine .= $content;

        } elseif (is_array($content)) {
            $logLine .= json_encode($content);

        } else {
            $logLine .= (string)$content;
        }

        $logLine .= PHP_EOL . PHP_EOL;

        $res = file_put_contents($file, $logLine, FILE_APPEND);
        if ($res === false) {
            throw new \Exception('Unable to write to log! ("' . $file . '")');
        }
    }

    /**
     * @return string
     */
    protected static function getPath()
    {
        return realpath(__DIR__ . '/../../../../../data/logs/') . '/';
    }


}
