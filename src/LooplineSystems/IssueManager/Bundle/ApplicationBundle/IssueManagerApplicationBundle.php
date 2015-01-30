<?php
namespace LooplineSystems\IssueManager\Bundle\ApplicationBundle;

use LooplineSystems\Helen\Bundle\ApplicationBundle\Events\Notification\TestEvent;
use LooplineSystems\Helen\Library\Notification\Adapter\MailAdapter;
use LooplineSystems\Helen\Library\Notification\Adapter\TaskAdapter;
use LooplineSystems\Helen\Library\Notification\Adapter\TaskRemoverAdapter;
use LooplineSystems\Helen\Library\Notification\Adapter\UpdateStreamAdapter;
use LooplineSystems\Helen\Library\Notification\Helper;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Doctrine\DBAL\Types\Type;

class IssueManagerApplicationBundle extends Bundle
{

    /**
     * Boots the Bundle.
     */
    public function boot()
    {
    }

}
