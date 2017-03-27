<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends Controller
{
    public function indexAction()
    {
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('shop');
        return $this->render('GuigurFrontBundle:Default:shop.html.twig', array("catchphrase" => $catchPhrase));
    }
}
