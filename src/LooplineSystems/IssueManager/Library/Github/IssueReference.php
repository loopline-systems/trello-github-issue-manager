<?php

namespace LooplineSystems\IssueManager\Library\Github;

class IssueReference
{
    /**
     * @param RepositoryInformation $repoInfo
     * @param string $issueTitle
     * @return string
     */
    public static function createReference(RepositoryInformation $repoInfo, $issueTitle = '')
    {
        $reference = '[**' . $repoInfo->getRepositoryName() . '**/' . $repoInfo->getIssueId() . '] ' . $issueTitle;
        $reference .= ' ' . self::getUrlByRepoAndIssue($repoInfo);

        return $reference;
    }

    /**
     * @param RepositoryInformation $repoInfo
     * @param string $title
     * @return string
     */
    public static function createReferenceFromRepositoryInformation(RepositoryInformation $repoInfo, $title)
    {
        return self::createReference($repoInfo, $title);
    }


    /**
     * @param RepositoryInformation $repoInfo
     * @return string
     */
    public static function getUrlByRepoAndIssue(RepositoryInformation $repoInfo)
    {
        return 'https://github.com/' . $repoInfo->getRepositoryNamespace()
            . '/' . $repoInfo->getRepositoryName()
            . '/issues/' . $repoInfo->getIssueId();
    }

    /**
     * @param string $url
     * @return RepositoryInformation|bool
     */
    public static function getRepositoryInformationFromUrl($url)
    {
        // normalize from url to to html_url
        $url = str_ireplace('/repos', '', $url);
        $url = str_ireplace('api.', '', $url);

        $pattern = '!https://github.com/(.+)/(.+)/issues/(.+)!';

        $result = preg_match_all($pattern, $url, $matches);

        if ($result !== 1 || count($matches) !== 4) {
            throw new \Exception('Can\'t parse repository information from URL!');
        }

        $repoInfo = new RepositoryInformation();
        $repoInfo->setRepositoryNamespace($matches[1][0]);
        $repoInfo->setRepositoryName($matches[2][0]);
        $repoInfo->setIssueId($matches[3][0]);

        return $repoInfo;
    }

}
