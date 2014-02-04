<?php

namespace AppShed\Extensions\RedmineBundle\Controller;

use AppShed\Remote\Element\Item\Link;
use AppShed\Remote\Element\Screen\Screen;
use AppShed\Remote\Exceptions\InvalidColorException;
use AppShed\Remote\Extensions\RedmineBundle\Services\Redmine;
use AppShed\Remote\HTML\Remote;
use AppShed\Remote\Style\Color;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * @Route("/projects")
     */
    public function indexAction()
    {
        $projects = $this->getRedmine()->getProjects();

        $screen = new Screen("Projects");

        foreach ($projects as $project) {
            $item = new Link($project['name']);
            $screen->addChild($item);
        }

        return (new Remote($screen))->getSymfonyResponse();
    }

    /**
     * @Route("/projects/{id}")
     */
    public function projectAction($id)
    {
    }

    /**
     * @return Redmine
     */
    protected function getRedmine()
    {
        return $this->get('appshed.redmine');
    }

}
