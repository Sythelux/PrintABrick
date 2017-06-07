<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends AbstractController
{
    /**
     * @Route("/set_tab/{tab}", name="set_tab", requirements={"tab"=".+"})
     */
    public function setDefaultTabAction(Request $request, $tab)
    {
        $session = $request->getSession();
        $session->set('tab', $tab);

        $response = new Response();

        return $response;
    }
}
