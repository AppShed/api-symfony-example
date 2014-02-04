<?php

namespace AppShed\Extensions\RedmineBundle\Controller;

use AppShed\Remote\Element\Item\Button;
use AppShed\Remote\Element\Item\Input;
use AppShed\Remote\Element\Item\Text;
use AppShed\Remote\Element\Screen\Screen;
use AppShed\Remote\HTML\Remote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $screen = new Screen("Hello Word");

        $screen->addChild(new Text("Hi!"));

        $inp = new Input("name", "What is your name?");
        $screen->addChild($inp);

        $btn = new Button("Go");
        $btn->setRemoteLink($this->generateUrl("hello", [], true));
        $btn->addVariable($inp);
        $screen->addChild($btn);

        $remote = new Remote($screen);
        return $remote->getSymfonyResponse();
    }

    /**
     * @Route("/hello", name="hello")
     */
    public function helloAction(Request $request)
    {
        $screen = new Screen("Hello Word");

        $name = $request->query->get('name');
        $screen->addChild(new Text("Hi $name!"));

        $remote = new Remote($screen);
        return $remote->getSymfonyResponse();
    }
}
