<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends Controller
{
    public function indexAction()
    {
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('shop');
        $page['header'] = "Magasin";
        return $this->render('GuigurFrontBundle:Default:shop.html.twig', array("Page" => $page, "catchphrase" => $catchPhrase));
    }
}
