<?php
namespace LooplineSystems\IssueManager\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{
    /**
     * @Route(path="/", name="home")
     */
    public function redirectMain()
    {
        if ($this->container->getParameter('kernel.debug')) {
            return $this->redirect($this->generateUrl('nelmio_api_doc_index'));

        } else {
            die('some error');
        }
    }
}
