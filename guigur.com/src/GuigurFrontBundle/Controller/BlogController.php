<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        $page['header'] = "Le blog";
        return $this->render('GuigurFrontBundle:Default:blog.html.twig', array("Page" => $page));
    }
}
