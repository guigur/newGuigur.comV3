<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class LinkShortenerController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuigurFrontBundle:Default:linkShortener.html.twig');
    }

    public function linksAction()
    {
        $user = $this->getUser();
        $linksUser = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findByUser($user->getId());
        return $this->render('GuigurFrontBundle:LinkShortener:linkShortenerList.html.twig', array("LinksUser" => $linksUser));
    }

    public function paramsAction($link)
    {
        $linkShortened = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findOneByLink($link);

        if($linkShortened != NULL)
        {
            if($linkShortened->getIsActive() === true)
            {
                return $this->redirect($linkShortened->getUrl());
            }
            else
            {
                $errorParam = "linkoff";
                return $this->redirectToRoute('LinkShortenerError', ['errorParam' => $errorParam]);
            }
        }
        else
        {
            $errorParam = "nolink";
            return $this->redirectToRoute('LinkShortenerError', ['errorParam' => $errorParam]);
        }
    }

    public function errorAction($errorParam)
    {
        $errorMsg = "";
        switch ($errorParam) {
            case "nolink":
                $errorMsg = "This link does not exist";
                break;
            case "linkoff":
                $errorMsg = "This link is Off";
                break;
            default:
                $errorMsg = "There is no error here... Did you type this URL and hope to get some eater egg or something ?";
        echo $errorMsg;
        }
        return $this->render('GuigurFrontBundle:Default:linkShortenerErrors.html.twig', array("ErrorMessage" => $errorMsg));
    }

    public function ajaxLinkShortenerToggleAction(Request $request)
    {
        if(isset($request->request)) {
            $request_id = $request->request->get('id');
            $entityManager = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $linksUser = $entityManager
                ->getRepository('GuigurFrontBundle:LinkShortener')
                ->findOneBy(array('id' => $request_id, 'user' => $user));

            if ($linksUser->getIsActive() === true)
                $linksUser->setIsActive(false);
            else
                $linksUser->setIsActive(true);
            $entityManager->flush();


            if(isset($linksUser))
            {
                return new JsonResponse(array(
                    'status' => 'OK',
                    'isActive' => $linksUser->getIsActive()),
                    200);
            }
            else
            {
                return new JsonResponse(array(
                    'status' => 'ERROR',
                    'debug' => $request,
                    'message' => 'ID of LinkShortened or User null'),
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


    public function ajaxLinkShortenerDeleteAction(Request $request)
    {
        if(isset($request->request)) {
            $request_id = $request->request->get('id');
            $entityManager = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $linksUser = $entityManager
                ->getRepository('GuigurFrontBundle:LinkShortener')
                ->findOneBy(array('id' => $request_id, 'user' => $user));


            if(isset($linksUser))
            {
                $entityManager->remove($linksUser);
                $entityManager->flush();
                return $this->linksAction();
            }
            else
            {
                return new JsonResponse(array(
                    'status' => 'ERROR',
                    'debug' => $request,
                    'message' => 'ID of LinkShortened or User null'),
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
