<?php
namespace LooplineSystems\IssueManager\Library\Trello\Api;

use LooplineSystems\IssueManager\Library\Github\IssueReference;
use LooplineSystems\IssueManager\Library\Github\RepositoryInformation;
use LooplineSystems\IssueManager\Library\ObjectPopulator;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Card;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\Checklist;
use LooplineSystems\IssueManager\Library\Trello\Api\Object\ChecklistItem;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class TrelloApiHelper implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var TrelloApi
     */
    protected $api;

    /**
     * @param TrelloApi $api
     */
    public function setApi(TrelloApi $api = null)
    {
        if ($this->api) {
            return;
        }

        if ($api) {
            $this->api = $api;
        } else {
            $this->api = $this->container->get('issue_manager.trello_api.api');
        }
    }

    /**
     * @param string $shortLink
     * @param bool $createChecklistIfNotExisting
     * @return Checklist|null
     */
    public function getChecklistFromCardShortLink($shortLink, $createChecklistIfNotExisting = false)
    {
        $this->setApi();

        $card = $this->api->getCardByShortLink($shortLink);
        if (! $card) {
            return null;
        }

        $issueChecklist = $this->getChecklistFromCard($card, $createChecklistIfNotExisting);

        return $issueChecklist;
    }

    /**
     * @param Card $card
     * @param bool $createChecklistIfNotExisting
     * @return Checklist|null
     */
    public function getChecklistFromCard(Card $card, $createChecklistIfNotExisting = false)
    {
        $issueChecklist = $this->getIssueChecklistFromCard($card);
        if (! $issueChecklist) {
            if ($createChecklistIfNotExisting) {
                $checklist = new Checklist();
                $checklist->setIdBoard($card->getIdBoard());
                $checklist->setIdCard($card->getId());

                $issueChecklist = $this->api->createChecklist($checklist);
            } else {
                return null;
            }
        }

        return $issueChecklist;
    }

    /**
     * @param Card $card
     * @return null|Checklist
     */
    protected function getIssueChecklistFromCard(Card $card)
    {
        $issueChecklist = null;

        foreach ($card->getIdChecklists() as $checklistId) {

            $checklist = $this->api->getChecklistById($checklistId);
            if ($checklist->getName() == Checklist::DEFAULT_NAME) {
                $issueChecklist = $checklist;
                break;
            }
        }

        return $issueChecklist;
    }

    /**
     * @param Checklist $checklist
     * @param RepositoryInformation $repositoryInformationNew
     * @return ChecklistItem|null
     */
    public function getChecklistItemByRepositoryInformation(Checklist $checklist = null, RepositoryInformation $repositoryInformationNew)
    {
        if (! $checklist || $checklist->getCheckItems() === null) {
            return null;
        }

        foreach ($checklist->getCheckItems() as $itemData) {
            $repoInfo = IssueReference::getRepositoryInformationFromUrl($itemData['name']);
            if (! $repoInfo) {
                continue;
            }

            if ($repoInfo->isSame($repositoryInformationNew)) {
                $checkItem = new ChecklistItem();
                $checkItem = ObjectPopulator::populate($checkItem, $itemData);
                $checkItem->setIdChecklist($checklist->getId());

                return $checkItem;
            }
        }

        return null;
    }

    /**
     * @param Checklist $checklist
     * @param RepositoryInformation $repoInfo
     * @param $title
     * @return ChecklistItem
     */
    public function createChecklistItem(Checklist $checklist, RepositoryInformation $repoInfo, $title)
    {
        $itemName = IssueReference::createReferenceFromRepositoryInformation($repoInfo, $title);

        $checklistItem = new ChecklistItem();
        $checklistItem->setIdChecklist($checklist->getId());
        $checklistItem->setName($itemName);

        return $this->api->createChecklistItem($checklistItem);
    }

    /**
     * @return TrelloApi
     */
    public function getTrelloApi()
    {
        if (! $this->api) {
            $this->setApi(null);
        }

        return $this->api;
    }

}
