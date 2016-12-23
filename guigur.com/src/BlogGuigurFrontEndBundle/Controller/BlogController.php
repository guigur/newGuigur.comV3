<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogGuigurFrontEndBundle:Default:blog.html.twig');
    }
}
