<?php

namespace LooplineSystems\IssueManager\Library\Trello;

class CardReference
{

    /**
     * eg: https://trello.com/c/rv1CwRlF/453-print-link-in-prepared-message-doesn-t-work
     * shortLink => rv1CwRlF
     *
     * @param string $shortLink
     * @return string
     */
    public static function getReferenceByCardShortLink($shortLink)
    {
        return '[' . $shortLink . ']';
    }

    /**
     * @param string $reference
     * @return string
     */
    public static function getCardShortLinkFromTitle($title)
    {
        $pattern = '/\[(.*)\]/';
        $result = preg_match($pattern, $title, $matches);

        if ($result !== 1) {
            throw new \Exception('Can not get trello card shortLink from title! (' . $title . ')');
        }

        return $matches[1];
    }

    /**
     * @param string $title
     * @return string
     */
    public static function removeReferenceFromTitle($title)
    {
        $shortLink = self::getCardShortLinkFromTitle($title);
        $reference = self::getReferenceByCardShortLink($shortLink);

        $cleanTitle = str_ireplace($reference, '', $title);

        return trim($cleanTitle);
    }

}
