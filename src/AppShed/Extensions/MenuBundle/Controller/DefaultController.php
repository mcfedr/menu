<?php

namespace AppShed\Extensions\MenuBundle\Controller;

use AppShed\Element\Screen\Screen;
use AppShed\HTML\Remote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $screen = new Screen("My screen");

        return (new Remote($screen))->getSymfonyResponse();
    }
}
