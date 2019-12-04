<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function indexAction()
    {

    }

    public function searchAction(Request $request)
    {
        if(isset($request->request)) {
            $request_searchTerms = $request->request->get('searchTerms');

            $projects = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Project')
                ->findBy(array('name' => $request_searchTerms,
                    'isEnabled' => true));

            $numbOfResults = count($projects);
            return new JsonResponse(array(
                'status' => 'OK',
                'debug' => $numbOfResults,
                'NumOfResults' => $numbOfResults),
                200);

        }
        else
        {
            return new JsonResponse(array(
                'status' => 'Bad Request',
                'NumberOfResults' => -1),
                400);
        }
    }
}
