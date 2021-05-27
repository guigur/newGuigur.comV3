<?php

namespace GuigurAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class AdmProjectController extends Controller
{
    public function indexAction(Request $request)
    {
        $projects = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Project')
            ->findAll();

        $Categories = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Categories')
            ->findAll();

        $ProjectsCategories = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:ProjectsCategories')
            ->findBy(array(), array('category' => 'ASC'));

        /////// TODO:FIX DIRTY ONE TO MANY !!!!!

        return $this->render('GuigurAdminBundle:Default:projects.html.twig',
            array("Projects" => $projects,
                  "Categories" => $Categories,
                  "ProjectsCategories" => $ProjectsCategories));
    }
}
