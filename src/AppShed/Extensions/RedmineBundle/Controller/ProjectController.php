<?php

namespace AppShed\Extensions\RedmineBundle\Controller;

use AppShed\Element\Item\Link;
use AppShed\Element\Screen\Screen;
use AppShed\Extensions\RedmineBundle\Services\Redmine;
use AppShed\HTML\Remote;
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

        foreach($projects as $project) {
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
