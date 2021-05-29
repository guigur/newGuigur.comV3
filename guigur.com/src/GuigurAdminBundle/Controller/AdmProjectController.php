<?php

namespace GuigurAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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


    public function ajaxStateToggleAction(Request $request)
    {
        if(isset($request->request))
        {
            $request_id = $request->request->get('id');
            $entityManager = $this->getDoctrine()->getManager();

            $project = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Project')
                ->findOneById($request_id);

            if ($project->getIsEnabled() === true)
                $project->setIsEnabled(false);
            else
                $project->setIsEnabled(true);
            $entityManager->flush();


            if(isset($project))
            {
                return new JsonResponse(array(
                    'status' => 'OK',
                    'isEnabled' => $project->getIsEnabled()),
                    200);
            }
            else
            {
                return new JsonResponse(array(
                    'status' => 'ERROR',
                    'debug' => $request,
                    'message' => 'error occured'),
                    400);
            }
        }
        else
        {
            return new JsonResponse(array(
                'status' => 'ERROR',
                'message' => 'Missing parameter'),
                400);
        }
    }
}
