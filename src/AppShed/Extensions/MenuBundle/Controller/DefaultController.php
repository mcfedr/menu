<?php

namespace AppShed\Extensions\MenuBundle\Controller;

use AppShed\Element\Item\Button;
use AppShed\Element\Item\Input;
use AppShed\Element\Item\Link;
use AppShed\Element\Item\Text;
use AppShed\Element\Screen\Screen;
use AppShed\HTML\Remote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $screen = new Screen("Welcome");

        $link = new Link("Create");
        $link->setRemoteLink($this->generateUrl('create', [], true));

        $screen->addChild($link);

        return (new Remote($screen))->getSymfonyResponse();
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction()
    {
        $screen = new Screen("Create");

        $inp = new Input('name', 'Name');
        $screen->addChild($inp);

        $btn = new Button('Save');
        $btn->setRemoteLink($this->generateUrl('save', [], true));
        $btn->addVariable($inp);

        $screen->addChild($btn);

        return (new Remote($screen))->getSymfonyResponse();
    }

    /**
     * @Route("/save", name="save")
     */
    public function saveAction(Request $request)
    {
        $name = $request->query->get('name');

        $screen = new Screen("Saved");

        $text = new Text($name);
        $screen->addChild($text);
        return (new Remote($screen))->getSymfonyResponse();
    }
}
