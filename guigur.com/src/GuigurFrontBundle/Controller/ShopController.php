<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuigurFrontBundle:Default:shop.html.twig');
    }
}
